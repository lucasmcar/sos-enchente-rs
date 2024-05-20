<?php

namespace App\Core\View;

class View 
{
    
    private $vars = [];
    private $layout;

    public function __construct(string $view, array $vars, $layout = 'layout')
    {
        $this->setLayout($layout);
        foreach($vars as $name => $value){
           $this->assignArray($name, $value);
            
        }
        $this->render($view);
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function getLayout()
    {
        return $this->layout;
    }

    
    private function assignArray($name, $value)
    {
        $this->vars[$name] = $value;
    }

    public function render($template)
    {
        $templatePath = __DIR__.'/../../views/' . $template . '.tpl';

        if (!file_exists($templatePath)) {
            throw new \Exception("Template $templatePath not found!");
        }

        extract($this->vars);

        ob_start();
        include $templatePath;
        $content = ob_get_clean();


        if ($this->layout) {
            $layoutPath =  __DIR__.'/../../views/layouts/' . $this->layout . '.tpl';
    
            if (!file_exists($layoutPath)) {
                throw new \Exception("Layout $layoutPath not found!");
            }
    
            // Include the content in the layout
             // Replace the {{ $content }} placeholder with the actual content
            $layoutContent = file_get_contents($layoutPath);
            $layoutContent = str_replace('{{ $content }}', $content, $layoutContent);
            $content = $layoutContent;
        
        }
        $parsedContent = $this->parse($content);
    
        // Render the parsed content within a safe context
        echo $this->renderContent($parsedContent, $this->vars);
    }

    private function parse($content)
    {
        $patterns = [
            '/\{\{\s*(.+?)\s*\}\}/',                         // Variables
            '/\{\%\s*if\s+(.+?)\s*\%\}/',                    // If statement
            '/\{\%\s*elseif\s+(.+?)\s*\%\}/' ,   //elseif
            '/\{\%\s*else\s*\%\}/',                 //else
            '/\{\%\s*endif;\s*\%\}/',                         // End if statement
            '/\{\%\s*foreach\s*(.+?)\s*as\s*(.+?)\s*=>\s*(.+?)\s*\%\}/', // Foreach statement
            '/\{\%\s*endforeach;\s*\%\}/',                    // End foreach statement
            '/\{\%\s*while\s+(.+?)\s*\%\}/',                 // While statement
            '/\{\%\s*endwhile;\s*\%\}/',                      // End while statement
            '/\{\%\s*include\s+\'(.+?)\'\s*\%\}/',           // Include statement
            '/\bnot\b/',                                     // Not operator
            '/\band\b/',                                     // And operator
            '/\bor\b/',                                      // Or operator
            '/\{\%\s*var_dump(.+?);\s*\%\}/'                        
        ];
    
        $replacements = [
            '<?php echo $1; ?>',
            '<?php if ($1): ?>',
            '<?php elseif ($1): ?>',
            '<?php else: ?>',
            '<?php endif; ?>',
            '<?php foreach ($1 as $2 => $3): ?>',
            '<?php endforeach; ?>',
            '<?php while ($1): ?>',
            '<?php endwhile; ?>',
            '<?php include __DIR__ . "/../../views/$1.tpl"; ?>',
            '!',
            '&&',
            '||',
            '<?php var_dump($1); ?>'
        ];
    
        return preg_replace($patterns, $replacements, $content);
    }

    private function renderContent($content, $vars)
    {
        extract($vars);

        $tempFile = tempnam(sys_get_temp_dir(), 'php');
        file_put_contents($tempFile, $content);

        ob_start();
        include $tempFile;
        //unlink($tempFile);
        return ob_get_clean();
    }
}