 <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
 <script>
     window.ga = function() {
         ga.q.push(arguments);
     };
     ga.q = [];
     ga.l = +new Date();
     ga("create", "UA-XXXXX-Y", "auto");
     ga("set", "anonymizeIp", true);
     ga("set", "transport", "beacon");
     ga("send", "pageview");
 </script>
 <script src="{{ url('https://www.google-analytics.com/analytics.js') }}" async></script>
 <script src="{{ asset('/frontend/js/app.js') }}"></script>
