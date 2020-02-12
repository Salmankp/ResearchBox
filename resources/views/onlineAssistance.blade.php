
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
</head>

@extends('theme.researcher-default')


@section('content')


<div class="col-sm-12">
<div class="row">
  <h2>Online Assistance</h2>

<div class="container">
   <table class="table table-striped">
      <tbody>
         <tr>
            <td colspan="1">
               <form class="well form-horizontal">
                  <fieldset>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Researcher Name</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="researcherName" name="researcherName" placeholder="Researcher Name" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">User Goal</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="userGoal" name="userGoal" placeholder="User Goal" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Type of Task</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span><input id="type" name="Type" placeholder="Type" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Task Name</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span><input id="taskName" name="taskName" placeholder="Task Name" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Title</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span><input id="title" name="title" placeholder="Title" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Numberof Subtasks</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span><input id="substasks" name="substasks" placeholder="Substasks" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>

                     <div class="form-group">
                        <label class="col-md-4 control-label">Answer</label>
                        <div class="col-md-8 inputGroupContainer">
                        <textarea class="form-control" id="answer" rows="4"></textarea>
                      </div>
                    </div>

                     <div class="form-group">
                        <label class="col-md-4 control-label">Charges</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span><input id="charges" name="charges" placeholder="Charges" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                  </fieldset>
               </form>
            <!-- </td>
            <td colspan="1">
               <form class="well form-horizontal">
                  <fieldset>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Father Name</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fatherName" name="fatherName" placeholder="Father Name" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Address Line 1</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="addressLine1" name="addressLine1" placeholder="Address Line 1" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Address Line 2</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="addressLine2" name="addressLine2" placeholder="Address Line 2" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">City</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="city" name="city" placeholder="City" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">State/Province/Region</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="state" name="state" placeholder="State/Province/Region" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Postal Code/ZIP</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="postcode" name="postcode" placeholder="Postal Code/ZIP" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Country</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group">
                              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                              <select class="selectpicker form-control">
                                 <option>A really long option to push the menu over the edget</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="email" name="email" placeholder="Email" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Phone Number</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="phoneNumber" name="phoneNumber" placeholder="Phone Number" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                  </fieldset>
               </form>
            </td> -->
         </tr>
      </tbody>
   </table>
</div>

</div>
</div>
@stop
