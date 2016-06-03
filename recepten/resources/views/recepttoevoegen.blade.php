@extends('templates.default')

@section('content')

<form action="{{ url('/recept/opslaan') }}" enctype="multipart/form-data" method="POST" class="form-horizontal" id="surveyForm">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<fieldset>

<!-- Form Name -->
<legend>Recept toevoegen</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Titel">Titel</label>
  <div class="col-md-4">
  <input id="Titel" name="Titel" type="text" placeholder="Titel" class="form-control input-md" required="">

  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="catagorieId">Catagorie</label>
  <div class="col-md-4">
    <select id="catagorieId" name="catagorieId" class="form-control">
      <option value="1">Voorgerechten</option>
      <option value="2">Hoofdgerechten</option>
      <option value="3">Nagerechten</option>
      <option value="4">Tussengerechten</option>
      <option value="5">Cake,gebak en taart</option>
      <option value="6">Overig</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="beschrijving">beschrijving</label>
  <div class="col-md-4">
    <textarea class="form-control" id="beschrijving" name="beschrijving"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Ingredienten">Ingredienten</label>
  <div class="col-md-4">
  <input id="Ingredienten" name="option[]" type="text" placeholder="Ingredienten" class="form-control input-md" required="">

  </div>
  <div class="col-xs-4">
            <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
        </div>
</div>

<!-- The option field template containing an option field and a Remove button -->
    <div class="form-group hide" id="optionTemplate">
        <div class="col-xs-offset-3 col-xs-5">
            <input class="form-control" type="text" name="option[]" />
        </div>
        <div class="col-xs-4">
            <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
        </div>
    </div>

<div class="form-group">
<label class="col-md-4 control-label" for="foto">foto</label>
  <input type="file" name="file">
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Toevoegen"></label>
  <div class="col-md-4">
    <button id="Toevoegen" name="Toevoegen" type="submit" class="btn btn-default">Recept toevoegen</button>
  </div>
</div>

</fieldset>
</form>

<?php

$array = array( 1, 2, 3 );
$string = serialize( $array );
echo $string;

?>

<script>
$(document).ready(function() {
    // The maximum number of options
    var MAX_OPTIONS = 25;

    $('#surveyForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                question: {
                    validators: {
                        notEmpty: {
                            message: 'The question required and cannot be empty'
                        }
                    }
                },
                'option[]': {
                    validators: {
                        notEmpty: {
                            message: 'The option required and cannot be empty'
                        },
                        stringLength: {
                            max: 100,
                            message: 'The option must be less than 100 characters long'
                        }
                    }
                }
            }
        })

        // Add button click handler
        .on('click', '.addButton', function() {
            var $template = $('#optionTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template),
                $option   = $clone.find('[name="option[]"]');

            // Add new field
            $('#surveyForm').formValidation('addField', $option);
        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row    = $(this).parents('.form-group'),
                $option = $row.find('[name="option[]"]');

            // Remove element containing the option
            $row.remove();

            // Remove field
            $('#surveyForm').formValidation('removeField', $option);
        })

        // Called after adding new field
        .on('added.field.fv', function(e, data) {
            // data.field   --> The field name
            // data.element --> The new field element
            // data.options --> The new field options

            if (data.field === 'option[]') {
                if ($('#surveyForm').find(':visible[name="option[]"]').length >= MAX_OPTIONS) {
                    $('#surveyForm').find('.addButton').attr('disabled', 'disabled');
                }
            }
        })

        // Called after removing the field
        .on('removed.field.fv', function(e, data) {
           if (data.field === 'option[]') {
                if ($('#surveyForm').find(':visible[name="option[]"]').length < MAX_OPTIONS) {
                    $('#surveyForm').find('.addButton').removeAttr('disabled');
                }
            }
        });
});
</script>

@endsection