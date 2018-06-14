            <footer class="footer t-a-c"> &copy; <?php echo date("Y"); ?> freelancing.zone | <a href="/terms" target="_blank">Terms of service</a></label>
            </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <div class="modal fade" id="myAdBlockModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Sorry...</h5>
          </div>
          <div class="modal-body">
            <p>
              Our website is made possible by displaying online advertisements to our visitors.<br>
              Please consider supporting us by disabling your ad blocker.
            </p>
          </div>
        </div>
      </div>
    </div>
    <script>
    $(function() {
        // Basic
        $('.dropify').dropify();

        // Used events
        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    $(function() {
        $('.textarea_editor').wysihtml5();
    });

    $(".select2").select2();

    $(function() {
        $('.grid-stack').gridstack({
            width: 12,
            alwaysShowResizeHandle: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
            resizable: {
                handles: 'e, se, s, sw, w'
            }
        });
    });

    // ==============================================================
    // calendar
    // ==============================================================

    /*
        date store today date.
        d store today date.
        m store current month.
        y store current year.
    */
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    /*
        Initialize fullCalendar and store into variable.
        Why in variable?
        Because doing so we can use it inside other function.
        In order to modify its option later.
    */

    var calendar = $('#calendar').fullCalendar({
        /*
            header option will define our calendar header.
            left define what will be at left position in calendar
            center define what will be at center position in calendar
            right define what will be at right position in calendar
        */
        header: {
            left: 'prev',
            center: 'title',
            right: 'next'
        },
        firstDay: 1,
        handleWindowResize: true,
        fixedWeekCount: false,
        /*
            editable: true allow user to edit events.
        */
        editable: true,
        /*
            events is the main option for calendar.
            for demo we have added predefined events in json object.
        */
        events: [{
            title: 'Birthday Party',
            start: new Date(y, m, d + 12, 22, 0),
            textColor: '#00bbd9'
        }, {
            title: 'Lunch',
            start: new Date(y, m, d + 22, 12, 30),
            textColor: '#e74a25'
        }, {
            title: 'Conference',
            start: new Date(y, m, d + 22, 18, 30),
            textColor: '#00bbd9'
        }, {
            title: 'Meeting',
            start: new Date(y, m, d + 27, 15, 30),
            textColor: '#2ecc71'
        }, {
            title: 'Appointment',
            start: new Date(y, m, d + 17, 17, 30),
            allDay: false,
            textColor: '#0283cc'
        }, {
            title: 'Car Loan',
            start: new Date(y, m, d + 17, 10, 0),
            allDay: false,
            textColor: '#e74a25'
        }, {
            title: 'Appointment',
            start: new Date(y, m, d, 10, 0),
            allDay: false,
            textColor: '#fff'
        }, {
            title: 'Car Loan',
            start: new Date(y, m, d, 17, 30),
            allDay: false,
            textColor: '#fff'
        }, {
            title: 'Party Time',
            start: new Date(y, m, d + 9, 17, 30),
            allDay: false,
            textColor: '#2ecc71'
        }],
        eventColor: 'transparent'
    });
    $(".fc-content").prepend('<i class="fa fa-circle m-r-5 font-10"></i>');

    </script>

    <!-- <script src="/resources/js/ads.js" type="text/javascript"></script> -->


    <script type="text/javascript">

    if(document.getElementById('lsrGvSMBReqL')){
    } else {
      /*
      $('#myAdBlockModal').modal({
        backdrop: 'static',
        keyboard: false
      });
      */
    }

    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114330504-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-114330504-1');
    </script>

</body>

</html>
