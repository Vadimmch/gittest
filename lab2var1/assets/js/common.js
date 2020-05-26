// HTML
function getRes1(e){
	var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "forms/lessons-by-student.php",
	  data: currentForm.serialize(),
	  success: function(result){
	  	$('#result1').html(result);
	  }
	});
}

// XML
function getRes2(e){
	var currentForm = $(e).parents('form');
	$.ajax({
	  type: "GET",
	  url: "forms/lessons-by-teacher.php",
	  data: currentForm.serialize(),
	  dataType: "xml",
	  success: function(result){
	  	var output = "";
	  	$(result).find('lessonItem').each(function(){
			output += '<tr>'+
  			'<td>' + $(this).find('weekDay').text() + '</td>' +
  			'<td>' + $(this).find('lessionNumber').text() + '</td>' +
  			'<td>' + $(this).find('auditorium').text() + '</td>' +
  			'<td>' + $(this).find('disciple').text() + '</td>' +
  			'<td>' + $(this).find('type').text() + '</td>' +
  			'</tr>';
	  	});
	  	$('#result2 tbody').html(output);
  		
	  },
	  error: function(data){
	  	console.log(data);
	  }
	});
}

// JSON
function getRes3(e){
	var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "forms/lessons-by-auditorium.php",
	  data: currentForm.serialize(),
	  dataType: "json",
	  success: function(result){
	  	var output = "";
	  	for (var i = 0; i < result.length; i++) {
	  		output += '<tr>'+
  			'<td>' + result[i].week_day + '</td>' +
  			'<td>' + result[i].lesson_number + '</td>' +
  			'<td>' + result[i].auditorium + '</td>' +
  			'<td>' + result[i].disciple + '</td>' +
  			'<td>' + result[i].type + '</td>' +
  			'</tr>';
	  	}
  		$('#result3 tbody').html(output);
	  }
	});
}


// Add Form
function getRes4(e){
	var currentForm = $(e).parents('form');
	
	$.ajax({
	  type: "GET",
	  url: "forms/add-lesson.php",
	  data: currentForm.serialize(),
	  success: function(result){
	  	alert(result);
	  	currentForm.trigger('reset');
	  }
	});
}