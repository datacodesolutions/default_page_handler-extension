<?php namespace Anomaly\DefaultPageHandlerExtension;

use Anomaly\PagesModule\Page\Handler\PageHandlerExtension;

/**
 * Class DefaultPageHandlerExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DefaultPageHandlerExtension
 */
class DefaultPageHandlerExtension extends PageHandlerExtension
{

    /**
     * This extension provides the default
     * page handler for the Pages module.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.pages::page_handler.default';

}
