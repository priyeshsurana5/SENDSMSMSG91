<!DOCTYPE html>
<html>
<head>
    <title>SMS Send</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>SMS Sender</h1>
        <form method="POST" action="/send-sms">
            @csrf
            <div class="row">
            <div class="col-md-12">
                <label for="template" class="form-label">Select Template:</label>
                <select name="template" class="form-control" id="template" class="form-select">
                    <option value="template1">Template 1</option>
                    <option value="template2">Template 2</option>
                </select>
            </div>
            
            <div class="col-md-11" id="mobile-container">
                <br>
                <label for="mobiles" class="form-label">Mobile Numbers:</label>
                <input type="text" name="mobiles[]" class="form-control" placeholder="Enter Mobile Number" required>
                <br>
            </div>
             <div class="col-md-1" >
                <br><br>
              <button type="button" class="btn btn-primary" id="add-mobile">Add Mobile</button>
            </div>
            
            <div class="col-md-12">
                <br>
                 <button type="submit" class="btn btn-success mt-3">Send SMS</button>
            </div>
            
        </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#add-mobile").click(function() {
                $("#mobile-container").append('<input type="text" name="mobiles[]" class="form-control" placeholder="Enter Mobile Number" required><br>');
            });
        });
    </script>
</body>
</html>
