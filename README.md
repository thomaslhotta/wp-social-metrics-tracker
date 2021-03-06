[![Build Status](https://travis-ci.org/chapmanu/wp-social-metrics-tracker.svg)](https://travis-ci.org/chapmanu/wp-social-metrics-tracker)

# Social Metrics Tracker

![screenshot](http://i.imgur.com/JdOEBV7.png)

**Social Metrics Tracker** is a Wordpress plugin for viewing and analyzing the social performance of your site. Out of the box, the plugin tracks social interactions for all of your posts and pages from a handful of popular networks, including Facebook, Twitter, GooglePlus, Pinterest, LinkedIn, and StumbleUpon by collecting data directly from social network APIs. The plugin is able to track data from multiple URLs, including differing protocols, subdomains, or other alternate post URLs. 

## Quick Start

1. Download the [latest release](https://github.com/chapmanu/wp-social-metrics-tracker/releases/latest).
2. Upload the folder `src` to your wp-plugins directory and rename it to `social-metrics-tracker`
3. From your [Dashboard Screen](http://codex.wordpress.org/Dashboard_Screen), add and activate the plugin.

![uploading the plugin](http://i.imgur.com/kWl0iIq.png)

That’s it.

![using the plugin](http://i.imgur.com/qey5upD.png)

 ... profit!

## Developer Guide

![Good news, everyone!](http://3.bp.blogspot.com/_J2l4ETMVCDo/TQEuvsblAFI/AAAAAAAAA3A/Olb2qTHKEZ8/s400/11111111.jpg)

**Social Metrics Tracker** stores social metrics in a way that can be accessed by other WP plugins or themes. For example, the social metrics could be used to display a feed of the most popular posts. Metrics are stored as **custom post meta fields** on each individual post.

To display the total number of social interactions, get the post meta:

```php
<?php echo get_post_meta(get_the_ID(), 'socialcount_TOTAL', true); ?>
```

Here is a listing of all of the available data fields which you can access in that way:

Service  | Meta Field Name
------------- | -------------
Total | socialcount_TOTAL
Facebook | socialcount_facebook
Twitter | socialcount_twitter
Google Plus | socialcount_googleplus
LinkedIn | socialcount_linkedin
Pinterest | socialcount_pinterest
StumbleUpon | socialcount_stumbleupon
Last Updated Timestamp | socialcount_LAST_UPDATED

### Setting alternate URLs

The plugin is able to associate multiple URLs with a single post (you would think canonical URLs would solve this sort of issue, but unfortunately social networks do not always or consistently obey canonical URL rules).  

To add an additional URL to track, create a custom meta field for each post you want to track. Let's imagine your primary URL for a post is `http://www.mydomain.com/?p=1` and you wanted to track some canonical URLs. Here is how you would add the custom meta fields to each post: 

Meta key  | value
------------- | -------------
socialcount_url_data | https://www.mydomain.com/?p=1
socialcount_url_data | http://mydomain.com/?p=1
socialcount_url_data | https://mydomain.com/?p=1

There is a settings page to configure some of these rules automatically, but you can also manually add alternate URLs to posts with custom meta fields. 

### Action Hooks

There are some Wordpress action hooks which can be used to extend the functionality of this plugin.

**social_metrics_post_sync** is called just before an individual post is updated.
**social_metrics_post_sync_complete** is called when an individual post update completes.

### Contributing to development

There are some *really super awesome* PHPUnit tests written to help make sure that code changes don't break any existing functionality. If you plan on submitting pull requests, please make sure to [read over the wiki page](https://github.com/chapmanu/wp-social-metrics-tracker/wiki/Plugin-testing-with-PHPUnit) which explains how to get PHPUnit up and running in your development environment. 

# FAQ

### Q: Where is social network data gathered from?

A: The information is retrieved directly from the public APIs that each social network provides. This plugin will make requests to these APIs periodically in order to display the latest possible data. 

### Q: What social networks are measured?

A: Facebook, Twitter, LinkedIn, StumbleUpon, Pinterest, and Google+.

### Q: When is the data updated?

A: When activating the plugin, all posts are queued for an update; this takes some time to complete. After that, the data is updated every few hours using the Wordpress Cron system. When a post is visited, if no update has happened recently then that post is placed in queue for an update. When the Wordpress Cron runs, all posts in the queue will be updated.  You can configure the TTL (the amount of time to wait between updates) on the options page for the plugin. This method of updating ensures that site visitors do not experience any additional load time due to these data updates.

### Q: Umm, what about page views?

A: You can totally sync your page view data from Google Analytics! Just go and sign up for a Google API developer key and follow the setup wizard hidden deep within the settings panel of this plugin... good luck! 

### Q. Was this made with magic?

A: Yes, we used the tears of a baby unicorn forlock. Also, PHP and PHPUnit.

### Q: A whole University created this? Who did you pay?

A: Please direct your praise and admonishment to [Ben Cole](https://github.com/bcole808), a Chapman University graduate turned staff and web marketing ninja / rockstar / whatever hipster phrase they are throwing around these days.

### Q: Graduate turned staff?

![Ben Cole](http://i.imgur.com/5sjt6KP.png)

### Q: Why was this done?

We wanted to track posts on social networks to see which stories students, alumni, and faculty were most interested in sharing. However, the application is far from limited to higher education. So, we thought, we should share this.

### Q: But why? I mean, really, why?

[42](https://www.google.com/#q=the+answer+to+life+the+universe+and+everything).

## Contributing

Anyone and everyone is welcome to [contribute](https://github.com/chapmanu/wp-social-metrics-tracker/issues).