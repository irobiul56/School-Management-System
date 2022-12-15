<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admission Admit Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  
<div class=" px-3 mt-5 border">
  <div class="row">
    <div class="col-sm-2 text-center">
      <a href="#"><img class="img-thumbnail" style="width: 150px;" src="{{url('storage/students/41eed50939414fca48e28989e785c974.jpg')}}" alt=""></a>
      <p>Serial No: {{$students -> id}}</p>
    </div>
    <div class="col-sm-8 text-center">
      <h1>Jamalpur Kaliakair M E H Arif Institute</h1>
      <p style="font-size: 16px">Jamalpur, Kaliakair, Gazipur.</p>
      <p>EIIN No: 138855 </p>
      <h2><strong class="border px-4 rounded">Admit Card</strong></h2>
      <br>
      
    </div>
    <div class="col-sm-2 text-center">     
        <a href="#"><img class="img-thumbnail" src="{{url('storage/students/', $students -> photo)}}" class="float-right" alt=""></a>
        <p class="text-center">Year: 2023</p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
        <table class="table table-striped table-responsive">
            <tbody>
              <tr>
                
                <td>Student Name</td>
                <td>: {{$students -> name}} ( {{$students-> student_id}} )</td>

              </tr>
              <tr>
                
                <td>Father's Name</td>
                <td>: {{$students -> fathername}}</td>

              </tr>
              <tr>
                
                <td>Mother's Name</td>
                <td>: {{$students -> mothername}}</td>

              </tr>
              <tr>
                
                <td>Admission Class</td>
                <td>: {{$students -> studentclass -> name}}</td>

              </tr>
              <tr>
                <td>Date Of Birth</td>
                <td>: {{$students -> dob}}</td>

              </tr>
              <tr>
                
                <td>Admission Exam Date</td>
                <td>: 27 - 12 - 2022, Tuesday </td>

              </tr>

              <tr>
                
                <td>Admission Exam Time</td>
                <td>: Moring 10:00 - 11:00 </td>

              </tr>
            </tbody>
          </table>
          <br>
          <br>
          <p class="text-right">Head Teacher Signature</p>
    </div>


</div>
</div>

</body>
</html>
