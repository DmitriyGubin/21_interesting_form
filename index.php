<!DOCTYPE html> 
<html>
<head>
    <title>форма</title>
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="fancybox/jquery.fancybox.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <script type="text/javascript" src="fancybox/jquery.fancybox.min.js"></script>
    <script src="js/jquery.mask.min.js" type="text/javascript"></script>
</head>
<body>
    <a class="show_popup hide" data-fancybox="pop-up" data-src="#succes_popup" href="javascript:;">
        Открыть окно
    </a>

    <section class="form_page wrap uprise">
        <div class="top_box">
            <div class="head_box">
                <a href="#">
                    <img class="head_logo" src="img/logo.svg">
                </a>

                <div class="phone_box">
                    <img class="phone_icon" src="img/phone-outlined.svg">
                    <a class="phone_ref" href="tel:88005000301">
                        8 800 500 03 01
                    </a>
                </div>
            </div>

            <div class="title_box">
                <h1 class="main_title">Заполните форму для получения одобрения</h1>
                <p class="sub_title">Легкий и прозрачный процесс одобрения поможет вам получить необходимые средства уже сегодня!</p>
            </div>

            <div class="progress">
                <div class="res_line">
                    <div class="res_box">
                        <div class="res_square">
                            <span id="progress_num">1 / 4</span>
                            <div class="triangle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form class="progress_form">
            <div class="step_form first_step">
                <h2 class="form_title">Контактные данные</h2>
                <div class="inp_box required string">
                    <label class="form-label">ФИО *</label>
                    <input type="text" class="univ_inp" name="fio">
                    <div class="error hide">Поле должно быть заполнено</div>
                </div>

                <div class="inp_box required contract_inp_box string">
                    <label class="form-label">Номер действующего договора *</label>
                    <input type="text" class="univ_inp" name="dog_num">
                    <div class="error hide">
                        Длина договора 11 символов и в нём должны быть и цифры и буквы.
                    </div>
                </div>

                 <div class="inp_box required phone_inp_box string">
                    <label class="form-label">Номер телефона, указанный в договоре *</label>
                    <input type="text" class="univ_inp phone" name="phone">
                    <div class="error hide">Поле должно быть заполнено</div>
                </div>

                <div class="inp_box">
                    <label class="form-label">Желаемая сумма добора</label>
                    <input type="text" class="univ_inp" name="money">
                    <div class="error hide">Поле должно быть заполнено</div>
                </div>
            </div>

            <div class="step_form second_step hide">
                <h2 class="form_title">Транспортное средство</h2>
                <div class="inp_box required string">
                    <label class="form-label">Марка *</label>
                    <input type="text" class="univ_inp" name="mark">
                    <div class="error hide">Поле должно быть заполнено</div>
                </div>

                <div class="inp_box required string">
                    <label class="form-label">Модель *</label>
                    <input type="text" class="univ_inp" name="model">
                    <div class="error hide">Поле должно быть заполнено</div>
                </div>

                <div class="inp_box required string">
                    <label class="form-label">Год выпуска *</label>
                    <input type="number" class="univ_inp" name="year">
                    <div class="error hide">Поле должно быть заполнено</div>
                </div>

                <div class="inp_box required string">
                    <label class="form-label">VIN-номер/номер кузова *</label>
                    <input type="text" class="univ_inp" name="vin">
                    <div class="error hide">Поле должно быть заполнено</div>
                </div>
            </div>

            <div class="step_form third_step hide">
                <h2 class="form_title">Фотография транспортного <br> средства с PIN-номером</h2>
                <div class="inp_box required file_inp_box">
                    <label class="form-label">Загрузите фото кузова с 4-х углов *</label>

                    <div class="file_box"><!-- все файлы -->
            
                    </div>

                    <div class="load_file" data-file="carcase">
                        <svg class="load_icon" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <path fill="currentColor" d="M 2 10C 2 12.757 4 15 7 15L 7 17C 3 17 0 13.866 0 10C 0 6.13403 3.13403 3 7 3L 7.02502 3.00098C 8.58398 1.16699 10.9041 0 13.5 0C 18.194 0 22 3.80603 22 8.5C 22 12.681 18.9771 16.141 15 16.85L 15 14.812C 17.8621 14.1331 20 11.567 20 8.5C 20 4.91602 17.084 2 13.5 2C 11.959 2 10.543 2.54199 9.42798 3.44104C 8.85205 3.90503 8.36206 4.46704 7.97205 5.09802C 7.65698 5.03601 7.33301 5 7 5C 6.53406 5 6.09094 5.08496 5.66296 5.20496C 3.55798 5.79395 2 7.70898 2 10ZM 13.6 12L 12 10.6053L 12 22L 10 22L 10 10.6053L 8.40002 12L 7 10.6595L 11 7L 15 10.6595L 13.6 12Z"></path>
                        </svg>

                        <span class="choose">Выберите файлы</span>
                    </div>
                    <div class="error hide">Поле должно быть заполнено</div>
                </div>

                <div class="inp_box required file_inp_box">
                    <label class="form-label">Загрузите фото подкапотного пространства *</label>

                    <div class="file_box"><!-- все файлы -->
                    </div>

                    <div class="load_file" data-file="under_hood">
                        <svg class="load_icon" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <path fill="currentColor" d="M 2 10C 2 12.757 4 15 7 15L 7 17C 3 17 0 13.866 0 10C 0 6.13403 3.13403 3 7 3L 7.02502 3.00098C 8.58398 1.16699 10.9041 0 13.5 0C 18.194 0 22 3.80603 22 8.5C 22 12.681 18.9771 16.141 15 16.85L 15 14.812C 17.8621 14.1331 20 11.567 20 8.5C 20 4.91602 17.084 2 13.5 2C 11.959 2 10.543 2.54199 9.42798 3.44104C 8.85205 3.90503 8.36206 4.46704 7.97205 5.09802C 7.65698 5.03601 7.33301 5 7 5C 6.53406 5 6.09094 5.08496 5.66296 5.20496C 3.55798 5.79395 2 7.70898 2 10ZM 13.6 12L 12 10.6053L 12 22L 10 22L 10 10.6053L 8.40002 12L 7 10.6595L 11 7L 15 10.6595L 13.6 12Z"></path> 
                        </svg>

                        <span class="choose">Выберите файлы</span>
                    </div>
                    <div class="error hide">Поле должно быть заполнено</div>
                </div>

                <div class="inp_box required file_inp_box">
                    <label class="form-label">Загрузите фото салона *</label>

                    <div class="file_box"><!-- все файлы -->
                    </div>

                    <div class="load_file" data-file="salon">
                        <svg class="load_icon" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <path fill="currentColor" d="M 2 10C 2 12.757 4 15 7 15L 7 17C 3 17 0 13.866 0 10C 0 6.13403 3.13403 3 7 3L 7.02502 3.00098C 8.58398 1.16699 10.9041 0 13.5 0C 18.194 0 22 3.80603 22 8.5C 22 12.681 18.9771 16.141 15 16.85L 15 14.812C 17.8621 14.1331 20 11.567 20 8.5C 20 4.91602 17.084 2 13.5 2C 11.959 2 10.543 2.54199 9.42798 3.44104C 8.85205 3.90503 8.36206 4.46704 7.97205 5.09802C 7.65698 5.03601 7.33301 5 7 5C 6.53406 5 6.09094 5.08496 5.66296 5.20496C 3.55798 5.79395 2 7.70898 2 10ZM 13.6 12L 12 10.6053L 12 22L 10 22L 10 10.6053L 8.40002 12L 7 10.6595L 11 7L 15 10.6595L 13.6 12Z"></path> 
                        </svg>

                        <span class="choose">Выберите файлы</span>
                    </div>
                    <div class="error hide">Поле должно быть заполнено</div>
                </div>

                <div class="inp_box required file_inp_box">
                    <label class="form-label">Загрузите фото приборной панели при заведённом двигателе *</label>

                    <div class="file_box"><!-- все файлы -->
                    </div>

                    <div class="load_file" data-file = "panel">
                        <svg class="load_icon" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <path fill="currentColor" d="M 2 10C 2 12.757 4 15 7 15L 7 17C 3 17 0 13.866 0 10C 0 6.13403 3.13403 3 7 3L 7.02502 3.00098C 8.58398 1.16699 10.9041 0 13.5 0C 18.194 0 22 3.80603 22 8.5C 22 12.681 18.9771 16.141 15 16.85L 15 14.812C 17.8621 14.1331 20 11.567 20 8.5C 20 4.91602 17.084 2 13.5 2C 11.959 2 10.543 2.54199 9.42798 3.44104C 8.85205 3.90503 8.36206 4.46704 7.97205 5.09802C 7.65698 5.03601 7.33301 5 7 5C 6.53406 5 6.09094 5.08496 5.66296 5.20496C 3.55798 5.79395 2 7.70898 2 10ZM 13.6 12L 12 10.6053L 12 22L 10 22L 10 10.6053L 8.40002 12L 7 10.6595L 11 7L 15 10.6595L 13.6 12Z"></path> 
                        </svg>

                        <span class="choose">Выберите файлы</span>
                    </div>
                    <div class="error hide">Поле должно быть заполнено</div>
                </div>
            </div>

            <div class="step_form fourth_step hide">
                <h2 class="form_title">Фотографии с PIN-номером</h2>
                <div class="inp_box">
                    <label class="form-label">Введите PIN-номер (4 цифры)</label>
                    <input type="number" class="univ_inp" name="pin">
                </div>

                <div class="inp_box required file_inp_box">
                    <label class="form-label">Загрузите фото с паспортом и PIN-номером *</label>

                    <div class="file_box"><!-- все файлы -->
                    </div>

                    <div class="load_file" data-file="passport">
                        <svg class="load_icon" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <path fill="currentColor" d="M 2 10C 2 12.757 4 15 7 15L 7 17C 3 17 0 13.866 0 10C 0 6.13403 3.13403 3 7 3L 7.02502 3.00098C 8.58398 1.16699 10.9041 0 13.5 0C 18.194 0 22 3.80603 22 8.5C 22 12.681 18.9771 16.141 15 16.85L 15 14.812C 17.8621 14.1331 20 11.567 20 8.5C 20 4.91602 17.084 2 13.5 2C 11.959 2 10.543 2.54199 9.42798 3.44104C 8.85205 3.90503 8.36206 4.46704 7.97205 5.09802C 7.65698 5.03601 7.33301 5 7 5C 6.53406 5 6.09094 5.08496 5.66296 5.20496C 3.55798 5.79395 2 7.70898 2 10ZM 13.6 12L 12 10.6053L 12 22L 10 22L 10 10.6053L 8.40002 12L 7 10.6595L 11 7L 15 10.6595L 13.6 12Z"></path> 
                        </svg>

                        <span class="choose">Выберите файлы</span>
                    </div>
                    <div class="error hide">Поле должно быть заполнено</div>
                </div>
            </div>

            <div class="button_box">
                <div class="prev_butt hide">
                    <svg class="back-icon" viewBox="0 -2 18 18" width="16" height="16"> <path d="M14.3946 8L10 12.6L11.3404 14L18 7L11.3404 0L10 1.4L14.3946 6H0V8H14.3946Z" transform="translate(18) scale(-1 1)"></path> </svg>
                </div>

                <button id="go_ahead" class="submit_butt">
                    <div class="loader hide"></div>
                    <span>Далее</span>
                </button>

                <div class="enter_var"> или нажмите Enter </div>
            </div>
        </form>

        <div class="bottom_box no-section">
            <a href="#">
                <img class="foot_logo" src="img/logo.svg">
            </a>

            <div class="delimeter"></div>
            
            <div class="last_line">
                © 2024 ВЗАИМОДЕЙСТВИЕ. Все права защищены
            </div>
        </div>
    </section>

    <div style="display: none;" id="succes_popup">
        <div class="round">
            <svg class="galka" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon"><path d="m23 12-2.44-2.79.34-3.69-3.61-.82-1.89-3.2L12 2.96 8.6 1.5 6.71 4.69 3.1 5.5l.34 3.7L1 12l2.44 2.79-.34 3.7 3.61.82L8.6 22.5l3.4-1.47 3.4 1.46 1.89-3.19 3.61-.82-.34-3.69L23 12zm-12.91 4.72-3.8-3.81 1.48-1.48 2.32 2.33 5.85-5.87 1.48 1.48-7.33 7.35z"></path></svg>
        </div>
        
        <h2 class="pop_title">
            Спасибо за заявку!  
        </h2>
        <p class="pop_sub">
              Ваша заявка на добор принята! <br>
              Наши менеджеры скоро свяжутся с вами  
        </p>
        <button class="close_butt">Готово</button>
    </div>

    <script type="text/javascript" src="js/main.js"></script>

</body>
</html> 