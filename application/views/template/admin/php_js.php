 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
 <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>

 <!-- Page level plugins -->
 <script src="<?= base_url('vendor/chart.js/Chart.min.js') ?>"></script>

 <!-- Page level custom scripts -->
 <script src="<?= base_url('js/demo/chart-area-demo.js') ?>"></script>
 <script src="<?= base_url('js/demo/chart-pie-demo.js') ?>"></script>

 <!-- Datatable -->
 <script src="<?= base_url('vendor/datatables/jquery.dataTables.min.js') ?>"></script>
 <script src="<?= base_url('vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

 <script>
     // Call the dataTables jQuery plugin
     $(document).ready(function() {
         $('#dataTable').DataTable();
     });

     function cekAngka(elem) {
         replace = formatCurrency(elem.value.replace(/[\\A-Za-z!"?$%^&*+_={}; ()\-\:'/@#~,?\<script>?|`?\]\[]/g, ''));
         if (replace.length == 0) replace = 0;
         elem.value = replace;
     }

     function formatCurrency(val) {

         x = val.split(".");
         num = x[0];

         if (num < 1) return "";
         num = num.toString().replace(/\$|\,/g, '');
         if (isNaN(num))
             num = "0";
         sign = (num == (num = Math.abs(num)));
         num = Math.floor(num * 100 + 0.50000000001);
         cents = num % 100;
         num = Math.floor(num / 100).toString();
         if (cents < 10)
             cents = "0" + cents;
         for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
             num = num.substring(0, num.length - (4 * i + 3)) + ',' +
             num.substring(num.length - (4 * i + 3));

         if (x.length == 1)
             return (((sign) ? '' : '-') + num);
         else
             return (((sign) ? '' : '-') + num + "." + x[1].substr(0, 2));
     }
 </script>