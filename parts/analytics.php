<?php $theme_option = flagship_sub_get_global_options();
      $analytics_id = $theme_option['flagship_sub_google_analytics']; ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $analytics_id; ?>', 'jhu.edu');
  ga('create', 'UA-40512757-1', {'name': 'globalKSAS'});
  ga('send', 'pageview');
  ga('globalKSAS.send', 'pageview');

</script>

<script async>
!function(){var e=document.createElement("script");e.type="text/javascript",e.async=!0,e.src="//siteimproveanalytics.com/js/siteanalyze_11464.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}();
</script>