<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
       <head>
              <title>Aloha Editor Example</title>
 
              <!-- load the Aloha Editor core and some plugins -->
              <script src="aloha/lib/aloha.js"
                                   data-aloha-plugins="common/format,
                                                        common/list,
                                                        common/link,
                                                        common/highlighteditables">
              </script>
               
              <!-- load the Aloha Editor CSS styles -->
              <link href="aloha/css/aloha.css" rel="stylesheet" type="text/css" />
 
              <!-- make all elements with class="editable" editable with Aloha Editor -->
              <script type="text/javascript">
                     Aloha.ready( function() {
                            var $ = Aloha.jQuery;
                            $('.editable').aloha();
                     });
              </script>
       </head>
       <body>
              <!--<h1 class="editable">Aloha Editor Example</h1>
 
              <p class="editable">Click to edit this paragraph.</p>
 
              <div class="editable">
                     <p>This is an editable div container.</p>
                     <p>Follow us on <a href="http://twitter.com/alohaeditor">Twitter</a>.</p>
                     <ul>
                            <li>list item one</li>
                            <li>list item two</li>
                     </ul>
              </div>-->
 
              <p>Use Aloha Editor your existing textarea elements:</p>
              <textarea class="editable">An editable textarea.</textarea>
       </body>
</html>