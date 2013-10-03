jQuery(function($){
        $.datepicker.regional['mk'] = {
                closeText: 'Done',
                prevText: '<',
                nextText: '>',
                currentText: 'Денес',
                monthNames: ['Јануари','Фебруари','Март','Април','Мај','Јуни',
                'Јули','Август','Септември','Октомври','Ноември','Декември'],
                monthNamesShort: ['Јан', 'Феб', 'Мар', 'Апр', 'Мај', 'Јун',
                'Јул', 'Авг', 'Сеп', 'Окт', 'Ное', 'Дек'],
                dayNames: ['Недела', 'Понеделник', 'Вторник', 'Среда', 'Четврток', 'Петок', 'Сабота'],
                dayNamesShort: ['Нед', 'Пон', 'Вто', 'Сре', 'Чет', 'Пет', 'Саб'],
                dayNamesMin: ['Н','П','В','С','Ч','П','С'],
                weekHeader: 'Wk',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['mk']);
        
        $.timepicker.regional['mk'] = {
        		timeOnlyTitle: 'Час',
        		timeText: 'Време',
        		hourText: 'Час',
        		minuteText: 'Минути',
        		secondText: 'Секунди',
        		millisecText: 'Милисекунди',
        		timezoneText: 'Временска зона',
        		currentText: 'Сега',
        		closeText: 'Затвори',
        		timeFormat: 'HH:mm',
        		amNames: ['AM', 'A'],
        		pmNames: ['PM', 'P'],
        		isRTL: false
        	};
        	$.timepicker.setDefaults($.timepicker.regional['mk']);
});

