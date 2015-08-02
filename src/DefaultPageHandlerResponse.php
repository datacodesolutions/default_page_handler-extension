<?php namespace Anomaly\DefaultPageHandlerExtension;

use Anomaly\PagesModule\Page\Contract\PageInterface;
use Anomaly\PagesModule\Page\PageAsset;
use Anomaly\PagesModule\Page\PageAuthorizer;
use Anomaly\PagesModule\Page\PageBreadcrumb;
use Anomaly\PagesModule\Page\PageContent;
use Anomaly\PagesModule\Page\PageHttp;
use Anomaly\PagesModule\Page\PageLoader;
use Anomaly\PagesModule\Page\PageResponse;

/**
 * Class DefaultPageHandlerResponse
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DefaultPageHandlerExtension
 */
class DefaultPageHandlerResponse
{

    /**
     * Create a new DefaultPageHandlerResponse instance.
     *
     * @param PageHttp       $http
     * @param PageAsset      $asset
     * @param PageLoader     $loader
     * @param PageContent    $content
     * @param PageResponse   $response
     * @param PageAuthorizer $authorizer
     * @param PageBreadcrumb $breadcrumb
     */
    public function __construct(
        PageHttp $http,
        PageAsset $asset,
        PageLoader $loader,
        PageContent $content,
        PageResponse $response,
        PageAuthorizer $authorizer,
        PageBreadcrumb $breadcrumb
    ) {
        $this->http       = $http;
        $this->asset      = $asset;
        $this->loader     = $loader;
        $this->content    = $content;
        $this->response   = $response;
        $this->breadcrumb = $breadcrumb;
        $this->authorizer = $authorizer;
    }

    /**
     * Make the response for a page.
     *
     * @param PageInterface $page
     * @return mixed
     */
    public function make(PageInterface $page)
    {
        $this->asset->add($page);
        $this->authorizer->authorize($page);
        $this->breadcrumb->make($page);
        $this->loader->load($page);

        $this->content->make($page);
        $this->response->make($page);
        $this->http->cache($page);

        return $page->getResponse();
    }
}
