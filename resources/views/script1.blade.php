<!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin.min.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
  <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>

  <!-- Script for search filter -->
<script src="{{asset('maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js')}}"></script>
<script src="{{asset('cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>


<script type="text/javascript">

    var subcategory = {
      Developer:["Middle-Tier Developer","Desktop Developer","Game Developer","Graphics Developer","Data Scientist","Big Data Developer","CRM Developer","DevOps Developer","WordPress Developer","High-Level Developer"],
      WebDevolpment: ["Front end Developer","Back end Developer","Full stack Developer"],
      AndroidDevolpment: ["Back end Developer"],
      IosDevolpment:["Back end Developer"],
      Designing:["Web Design","User Interface Design","Visual Identity Design","Logo Design","Corporate Design"],
      Management:["Marketing","Sales","Accounting","Finance","HR","Admin","Operations","SupplyChain","Inventory","Advertising"],
      Engenering:["Civil Engenering","Mechanical Engenering","Architectural Engenering","Electrical Engenering","Computer Engenering"],
      QualityAssurance:["Software Quality Assurance","Software Quality Enginer","Embedded Test Engineer"],
      ContentWriter:["Writer"]

      }

      function makeSubmenu(value)
      {
      if(value.length==0) document.getElementById("categorySelect").innerHTML = "<option></option>";
      else
      {
      var citiesOptions = "";
      for(categoryId in subcategory[value]) {
      citiesOptions+="<option>"+subcategory[value][categoryId]+"</option>";
      }
      document.getElementById("categorySelect").innerHTML = citiesOptions;
      }
      }
      function displaySelected() { var country = document.getElementById("category").value;
      var city = document.getElementById("categorySelect").value;
      alert(country+"\n"+city);
      }
      function resetSelection() {
      document.getElementById("category").selectedIndex = 0;
      document.getElementById("categorySelect").selectedIndex = 0;
      }
    </script>
