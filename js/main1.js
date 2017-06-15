(function ($, undefined) {
    $( document ).ready(function() {

        //Режим редактирования профиля
        var personForm = $('#personeRedactor');
        var personInputs = personForm.find('input');
        personInputs.attr('readonly', 'trye');

        var personeRedactButton = $('#personeRedsct');
        personeRedactButton.click(function() {
            if(personInputs.attr('readonly')){
                personInputs.removeAttr('readonly');
                $('.hidden').css('display', 'block');
            }else{
                personInputs.attr('readonly', 'trye');
                $('.hidden').css('display', 'none');
            }
            return false;
        });

        //Режим редактирования отчётности
        var reportForm = $('#reportForm');
        var reportInputs = reportForm.find('input');
        reportInputs.attr('readonly', 'trye');

        var reportRedactButton = $('#repotrRedact');
        reportRedactButton.click(function() {
            if(reportInputs.attr('readonly')){
                reportInputs.removeAttr('readonly');
                $('.hidden').css('display', 'block');
            }else{
                reportInputs.attr('readonly', 'trye');
                $('.hidden').css('display', 'none');
            }
            return false;
        });

    });
})(jQuery);

