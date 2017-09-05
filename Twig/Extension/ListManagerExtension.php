<?php

namespace TangoMan\ListManagerBundle\Twig\Extension;

class ListManagerExtension extends \Twig_Extension
{
    /**
     * @var \Twig_Environment
     */
    private $template;

    /**
     * @return string
     */
    public function getName()
    {
        return 'tangoman_listmanager';
    }

    /**
     * ListManagerExtension constructor.
     *
     * @param \Twig_Environment $template
     */
    public function __construct(\Twig_Environment $template)
    {
        $this->template = $template;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'searchForm', [$this, 'searchFormFunction'], ['is_safe' => ['html']]
            ),
            new \Twig_SimpleFunction(
                'thead', [$this, 'theadFunction'], ['is_safe' => ['html']]
            ),
        ];
    }

    /**
     * @param        $form
     * @param string $template
     *
     * @return string
     */
    public function searchFormFunction($form, $template = 'search')
    {
        if ($template == 'search') {
            $template = '@TangoManListManager/'.$template.'.html.twig';
        }

        if (is_string($form)) {
            $form = json_decode($form);
        }

        return $this->template->render(
            $template, [
                         'form' => $form,
                     ]
        );
    }

    /**
     * @param        $thead
     * @param string $template
     *
     * @return string
     */
    public function theadFunction($thead, $template = 'thead')
    {
        if ($template == 'thead') {
            $template = '@TangoManListManager/'.$template.'.html.twig';
        }

        if (is_string($thead)) {
            $thead = json_decode($thead);
        }

        return $this->template->render(
            $template, [
                         'thead' => $thead,
                     ]
        );
    }
}
