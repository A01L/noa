function include(file) {
	var script = document.createElement('script');
	script.src = file;
	script.type = 'text/javascript';
	script.defer = true;
	document.getElementsByTagName('head').item(0).appendChild(script);
}
include('ectr/jquery.min.js');

const data = {
    put: function(id, data) {
        document.getElementById(id).innerHTML = data;
    },

    get: function(id) {
        return document.getElementById(id).value;
    },

    set: function(id, data) {
        document.getElementById(id).value = data;
    },

    action: function(url, form) {
        // заполним FormData данными из формы (document.forms.FORM_NAME)
        let formData = new FormData(document.forms[form]);
    
    
        let xhr = new XMLHttpRequest();
        xhr.open("POST", url);
        xhr.send(formData);
    },

    ajax: function(url, ajax_form) {
        $.ajax({
            url: url, 
            type: "POST", 
            dataType: "html", 
            data: $("#" + ajax_form).serialize(),  
            success: function (response) { 
                result = $.parseJSON(response);
                return result;
            },
            error: function (response) { 
                $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });
    }

}

const CC = {
    // Создание куки
    set: function(name, value, days) {
        let expires = "";
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    },

    // Получение куки
    get: function(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    },

    // Проверка существования куки
    check: function(name) {
        return this.get(name) !== null;
    },

    // Удаление куки
    dell: function(name) {
        document.cookie = name + '=; Max-Age=-99999999;';
    }
};

// Пример использования:

// // Установка куки 'username' на 7 дней
// CC.set('username', 'JohnDoe', 7);

// // Получение куки 'username'
// console.log(CC.get('username')); // Выведет 'JohnDoe'

// // Проверка существования куки 'username'
// console.log(CC.check('username')); // Выведет true

// // Удаление куки 'username'
// CC.dell('username');

// // Проверка существования куки 'username' после удаления
// console.log(CC.check('username')); // Выведет false


