<!-- // <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
<!-- Bootstrap -->
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url('js/plugins/datatables/jquery.dataTables.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('js/plugins/datatables/dataTables.bootstrap.js'); ?>" type="text/javascript"></script>        
<!-- inistyle App -->
<script src="<?php echo base_url('js/inistyle/app.js'); ?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>" type="text/javascript"></script>
<script src='<?php echo base_url('js/plugins/clnder/json2.js'); ?>'></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src='<?php echo base_url('js/plugins/clnder/moment.js'); ?>'></script>
<script src='<?php echo base_url('js/plugins/clnder/clndr.js'); ?>'></script>
<script src='<?php echo base_url('js/plugins/clnder/site.js'); ?>'></script>
<script src='<?php echo base_url('js/plugins/carousel/owl.carousel.js'); ?>'></script>
<script src='<?php echo base_url('js/plugins/jqueryKnob/jquery.knob.js'); ?>'></script>

<script type="text/javascript">
    $(function() {
        $(".textarea").wysihtml5();
        $("#dataTable").dataTable();
        $("#dataTable-2").dataTable();
        $("#dataTable-3").dataTable();
        /* jQueryKnob */
        $(".knob").knob({
            /*change : function (value) {
             //console.log("change : " + value);
             },
             release : function (value) {
             console.log("release : " + value);
             },
             cancel : function () {
             console.log("cancel : " + this.value);
             },*/
            draw: function() {

                // "tron" case
                if (this.$.data('skin') == 'tron') {

                    var a = this.angle(this.cv)  // Angle
                            , sa = this.startAngle          // Previous start angle
                            , sat = this.startAngle         // Start angle
                            , ea                            // Previous end angle
                            , eat = sat + a                 // End angle
                            , r = true;

                    this.g.lineWidth = this.lineWidth;

                    this.o.cursor
                            && (sat = eat - 0.3)
                            && (eat = eat + 0.3);

                    if (this.o.displayPrevious) {
                        ea = this.startAngle + this.angle(this.value);
                        this.o.cursor
                                && (sa = ea - 0.3)
                                && (ea = ea + 0.3);
                        this.g.beginPath();
                        this.g.strokeStyle = this.previousColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                        this.g.stroke();
                    }

                    this.g.beginPath();
                    this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                    this.g.stroke();

                    this.g.lineWidth = 2;
                    this.g.beginPath();
                    this.g.strokeStyle = this.o.fgColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                    this.g.stroke();

                    return false;
                }
            }
        });
    });
</script>

</body>
</html>
