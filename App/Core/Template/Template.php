<?php 

namespace App\Core\Template;

class Template
{

    private $vars = [];

    public function assign($name, $value)
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
        
        $parsedContent = $this->parse($content);

        // Render the parsed content within a safe context
        echo $this->renderContent($parsedContent, $this->vars);
    }

    private function parse($content)
    {
        $patterns = [
            '/\{\{(.+?)\}\}/',                         // Variables
            '/\{\% if (.+?) \%\}/',                    // If statement
            '/\{\% else \%\}/',                        // Else statement
            '/\{\% endif \%\}/',                       // End if statement
            '/\{\%\s*foreach\s*(.+?)\s*\%\}/',         // Foreach statement
            '/\{\% endforeach \%\}/',                  // End foreach statement
            '/\{\% while (.+?) \%\}/',                 // While statement
            '/\{\% endwhile \%\}/'                     // End while statement
        ];

        $replacements = [
            '<?php echo $1; ?>',
            '<?php if $1: ?>',
            '<?php else: ?>',
            '<?php endif; ?>',
            '<?php foreach $1: ?>',
            '<?php endforeach; ?>',
            '<?php while $1: ?>',
            '<?php endwhile; ?>'
        ];

        return preg_replace($patterns, $replacements, $content);
    }

    private function renderContent($content, $vars)
    {
        extract($vars);

        ob_start();
        eval('?>' . $content);
        return ob_get_clean();
    }

} 