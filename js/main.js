$(".phone").mask("+7(999) 999-9999");

var step_num = 0;
var sequence = ['.first_step', '.second_step', '.third_step', '.fourth_step'];
var prev_butt = $('.form_page .prev_butt');

$('#succes_popup .close_butt').on('click', function(){
	$.fancybox.close({src: '#succes_popup'});	
});

$('#go_ahead').on('click', Go_Ahead);

document.addEventListener('keydown', function(event){
	if(event.key == 'Enter')
	{
		Go_Ahead(event);
	}
});

prev_butt.on('click', Go_Back);

/*******создание файлов**************/
function Create_Tags_File(id,inp_name)
{
	let div = document.createElement('div');
	div.classList.add(id);
	div.classList.add('file_box_item');
	let inp = document.createElement('input');
	inp.classList.add('hide');
	inp.name = inp_name + '[]';
	inp.id = id;
	inp.type = 'file';
	inp.multiple = 'yes';
	div.appendChild(inp);
	return div;
}

function Create_Doc(name,lastmodify)
{
	let div = document.createElement('div');
	div.classList.add('file_item');
	div.dataset.lastmod = lastmodify;
	div.innerHTML = `
		<svg class="icon_file" viewBox="0 0 18 22" xmlns="http://www.w3.org/2000/svg"> <path d="M16 19.0003C16 19.5526 15.5523 20.0003 15 20.0003H3C2.44772 20.0003 2 19.5526 2 19.0003V3.0003C2 2.44802 2.44772 2.00031 3 2.00031H9V7.00031C9 8.10487 9.89543 9.00031 11 9.00031H16V19.0003ZM15.1716 7.00031L11 2.82873V7.00031H15.1716ZM0 3.0003C0 1.34345 1.34315 0.000305176 3 0.000305176H9.75736C10.553 0.000305176 11.3161 0.316376 11.8787 0.878985L17.1213 6.12163C17.6839 6.68424 18 7.4473 18 8.24295V19.0003C18 20.6572 16.6569 22.0003 15 22.0003H3C1.34315 22.0003 0 20.6572 0 19.0003V3.0003Z"></path> </svg>
        <span class="file_name">${name}</span>
        <svg class="delete_file hide" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg"> <path d="M0 9.00031L1 10.0003L5 6.00031L9 10.0003L10 9.00031L6 5.00031L10 1.00031L9 0.000305176L5 4.00031L1 0.000305176L0 1.00031L4 5.00031L0 9.00031Z"></path> </svg>
	`;
	return div;
}

function Delete_Files()
{
	$('.file_box .file_box_item').each(function() {
		let input = $(this).find('input')[0];

		let file_items = $(this)[0].querySelectorAll(".file_item");
		for(let item of file_items)
		{
			let last_mod = item.dataset.lastmod;
			let file_name = item.querySelector(".file_name").innerHTML;
			$delete_butt = item.querySelector(".delete_file");
			$delete_butt.removeEventListener('click',() => Delete_File(item, input, last_mod, file_name));
			$delete_butt.addEventListener('click',() => Delete_File(item, input, last_mod, file_name));
		}
	});
}

function Delete_File(this_elem, input, last_mod, file_name)
{
	this_elem.remove();

	var all_file = input.files;

	// Создаем коллекцию файлов:
	var dt = new DataTransfer();
	for(let item of all_file)
	{
		if((item.name != file_name) && (item.lastModified != last_mod))
		{
			dt.items.add(item);
		}
	}

	// Вставим созданную коллекцию в реальное поле:
	input.files = dt.files;

	if(input.files.length == 0)
	{
		$("." + input.id + ".file_box_item")[0].remove();
	}
}

$('.inp_box.file_inp_box').each(function() {

	var $file_box = $(this).find('.file_box');
	var $load_butt = $(this).find('.load_file');
	var $red_error = $(this).find('.error');
	$load_butt.on('click', function(){
		var date = new Date();
		var id = 'new_' + date.getTime();
		var inp_name = $load_butt[0].dataset.file;
		var tegs = Create_Tags_File(id,inp_name);
		$file_box[0].appendChild(tegs);
		$('#' + id)[0].click();
		$('#' + id).on('change', function(){
			//console.log($(this)[0].files);
			for(let item of $(this)[0].files)
			{
				let doc = Create_Doc(item.name,item.lastModified);
				$('div.' + id)[0].appendChild(doc);
			}
			$red_error.addClass("hide");
			Delete_Files();
		});
	});
});

/*******создание файлов**************/


function Scroll_To_Element()
{
	$('.form_page .title_box')[0].scrollIntoView({
		behavior: 'smooth',
		block: 'start',
	});
}

function Change_Progress_Bar()
{
	var cur_step = step_num + 1;
	width = cur_step*25 + '%';
	$('.form_page .res_line').css('width', width);
	$('#progress_num').html(cur_step + ' / 4');
}

function Go_Back()
{
	step_num--;
	if(step_num == 0)
	{
		prev_butt.addClass("hide");
	}
	Switch_Forms(sequence[step_num]);
	Scroll_To_Element();
	Change_Progress_Bar();
}


function Go_Ahead(event)
{
	event.preventDefault();
	if(step_num != 3)
	{
		Scroll_To_Element();
	}
	$form = $(sequence[step_num]);

	var err = Validate($form);

	if(err == 0)
	{
		if(step_num < 3)
		{
			step_num++;
			if(step_num == 1)
			{
				prev_butt.removeClass("hide");
			}
			Switch_Forms(sequence[step_num]);
			Change_Progress_Bar();
		}
		else if(step_num == 3)
		{
			$('#go_ahead .loader').removeClass("hide");
			Send_Mail();
		}
	}
}

function Send_Mail()
{
	let form = document.querySelector('form');
	var formData = new FormData(form);

	event.preventDefault();
			
	$.ajax({
		type: "POST",
		url: 'mail.php',
		contentType: false,
		processData: false,
		data: formData,
		dataType: "json",
		success: function(data){

			if (data.status == true)
			{
				$('#go_ahead .loader').addClass("hide");
				$.fancybox.open({src: '#succes_popup'});
				$('.form_page .progress_form')[0].reset();
				Switch_Forms('.first_step');
				$('.file_box .file_box_item').remove();
				step_num = 0;
				Change_Progress_Bar();
				$('.form_page .prev_butt').addClass("hide");
				//console.log(data.test);
 			}
		}
	});
}



function Switch_Forms(form_selector)
{
	$('.step_form').addClass("hide");
	$(form_selector).removeClass("hide");
}

function Validate($form_ref)
{
	var err=0;

	var pattern = /^(?=.*\d)(?=.*[a-zа-яё])[a-zа-яё0-9]{11}$/i;

	var inp_boxes = $form_ref.find('.inp_box.required');

	inp_boxes.each(function() {

		var $inp = $(this).find('input');
		var $error = $(this).find('.error');
		var inp_val = $inp.val();
		var bool;

		if($(this).hasClass('phone_inp_box'))
		{
			bool = (inp_val.length != 16);
		}
		else if($(this).hasClass('contract_inp_box'))
		{
			bool = (!pattern.test(inp_val));
		}
		else if($(this).hasClass('file_inp_box'))
		{
			let inps = $(this)[0].querySelectorAll('input');
			var files = 0;
			if(inps.length != 0)
			{
				for(let one_imp of inps)
				{
					files = files + one_imp.files.length;
				}
			}
			
			if(files == 0)
			{
				bool = true;
			}
			else
			{
				bool = false;	
			}
		}
		else
		{
			bool = (inp_val == '');
		}

        if (bool)
        {
            err++;
            $error.removeClass("hide");

            $(this).addClass("anime");
        } 
        else 
        {
            $error.addClass("hide");
        }
	});

	setTimeout(function() {
		inp_boxes.removeClass("anime");
	}, 1000);

    return err;
}

/***Во время набора пропадает ошибка***/
var elements = document.querySelectorAll(".inp_box.required.string");
for(let item of elements)
{
	let error = item.querySelector('.error');
	let input = item.querySelector('input');
	input.addEventListener('input', function() {
		error.classList.add('hide');
	});
}
/***Во время набора пропадает ошибка***/

/**********Плавное появление блоков при скролле**************/
window.addEventListener('scroll', Scroll);

function Scroll()
{
	var elements = document.querySelectorAll(".no-section");

	if(elements.length != 0)
	{
		for (let item of elements)
		{
			let offset = item.getBoundingClientRect().top - document.documentElement.clientHeight;
			if (offset < 0)
			{
				item.classList.remove('no-section');
			}
		}
	}
}

/**********Плавное появление блоков при скролле**************/

$('.form_page.wrap').removeClass("uprise");

