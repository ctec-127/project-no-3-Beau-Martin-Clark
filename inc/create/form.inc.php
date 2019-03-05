<?php // Filename: form.inc.php ?>

<!-- creates and submits a POST form  to PHP_SELF to allow users to input new records -->

<!-- Note the use of sticky fields below -->
<!-- Note the use of the PHP Ternary operator
Scroll down the page
http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
-->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <label class="col-form-label" for="first">First Name </label>
    <input class="form-control" type="text" id="first" name="first" value="<?php echo (isset($first) ? $first: '');?>">
    <br>
    <label class="col-form-label" for="last">Last Name </label>
    <input class="form-control" type="text" id="last" name="last" value="<?php echo (isset($last) ? $last: '');?>"">
    <br>
    <label class="col-form-label" for="id">Student ID </label>
    <input class="form-control" type="text" id="id" name="id" value="<?php echo (isset($id) ? $id: '');?>"">
    <br>
    <label class="col-form-label" for="email">Email </label>
    <input class="form-control" type="text" id="email" name="email" value="<?php echo (isset($email) ? $email: '');?>"">
    <br>
    <label class="col-form-label" for="phone">Phone </label>
    <input class="form-control" type="text" id="phone" name="phone" value="<?php echo (isset($phone) ? $phone: '');?>"">
    <br>
    <label class="col-form-label" for="gpa">GPA </label>
    <input class="form-control" type="text" id="gpa" name="gpa" value="<?php echo (isset($gpa) ? $gpa: '');?>"">
    <br>

    <p class="m-0 form-label">Financial Aid</p>
    <?php 
        $yes_checked = '';
        $no_checked = '';
      if(isset($financial_aid)) {
        if ($financial_aid == '1') {
            $yes_checked = 'checked';
        } else if ($financial_aid == '0'){
            $no_checked = 'checked';
        }
      }
    ?>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="financial_aid" id="financial_aid_yes" value="1" <?=$yes_checked?>>
        <label class="col-form-label" for="financial_aid_yes">Yes</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="financial_aid" id="financial_aid_no" value="0" <?=$no_checked?>>
        <label class="col-form-label" for="financial_aid_no">No</label>
    </div>
  

    <?php 

        $un_selected = '';
        $aa_selected = '';
        $as_selected = '';
        $ast_selected = '';
        $bsam_selected = '';

        if(isset($degree_program)) {
        if ($degree_program == 'un') {
            $un_selected = 'selected';
        } else if ($degree_program == 'aa'){
            $aa_selected = 'selected';
        } else if ($degree_program == 'as'){
            $as_selected = 'selected';
        } else if ($degree_program == 'ast'){
            $ast_selected = 'selected';
        } else if ($degree_program == 'bsam'){
            $bsam_selected = 'selected';
      }
    }
    ?>

    <br>
    <label class="col-form-label" for="degree_program">Degree Program </label>
    <select class="form-control" name="degree_program" id="degree_program">
        <option <?php echo $un_selected;?> value="un">Undeclared</option>
        <option <?php echo $aa_selected;?> value="aa">Associate of Arts</option>
        <option <?php echo $as_selected;?> value="as">Associate of Science</option>
        <option <?php echo $ast_selected;?> value="ast">Associate in Applied Science-Transfer</option>
        <option <?php echo $bsam_selected;?> value="bsam">Bachelor of Applied Management</option>
    </select>
    <br>

    <a href="display-records.php">Cancel</a>&nbsp;&nbsp;
    <button class="btn btn-primary" type="submit">Save Record</button>
</form>