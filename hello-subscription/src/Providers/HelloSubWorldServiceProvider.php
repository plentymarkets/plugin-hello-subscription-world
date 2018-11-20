<?php
namespace HelloSubWorld\Providers;

use Plenty\Plugin\ServiceProvider;
use HelloSubWorld\Models\SubscriptionInfo;
use HelloSubWorld\Providers\HelloSubWorldRouteServiceProvider;
use HelloSubWorld\Providers\ServiceProviderForFreeComponenents;
use HelloSubWorld\Providers\ServiceProviderForPremiumComponenents;
use Plenty\Modules\PlentyMarketplace\Contracts\SubscriptionInformationServiceContract;
use Plenty\Modules\PlentyMarketplace\Models\SubscriptionOrderInformation;

/**
 * Class HelloSubWorldServiceProvider
 * @package HelloSubWorld\Providers
 */
class HelloSubWorldServiceProvider extends ServiceProvider
{

	/**
	 * plentymarkets subscription info service
	 * @var SubscriptionInformationServiceContract
	 */
	protected $subscriptionInfoService;

	/**
	 * Register the service provider.
	 */
	public function register()
	{
		$this->getApplication()->register(HelloSubWorldRouteServiceProvider::class);
		$this->getApplication()->register(ServiceProviderForFreeComponenents::class);

		// get the Subscription Service
		$this->subscriptionInfoService = pluginApp(SubscriptionInformationServiceContract::class);

    	// check if the subscription has been paid
	    if ( $this->subscriptionInfoService->isPaid('HelloSubWorld') )
	    {
	        $this->getApplication()->register(ServiceProviderForPremiumComponenents::class);
	    }
	}
}