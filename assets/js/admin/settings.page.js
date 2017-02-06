$j = jQuery.noConflict();

$j(document).ready(function(){
    var settings = new Settings;
    settings.init();
});

var Settings = function() {

    var self = this;

    self.$settingsForm = null;

    self.init = function(){
        self.$settingsForm = $j('#wpsr_settings');
        self.initEvents();
    };

    self.initEvents = function(){
        $j('#wpsr_create_wp_user_on_signup').click(self.toggleRoleSelection);
    };

    self.toggleRoleSelection = function(event){

        if(!$j(event.target).is(':disabled'))
        {
            var $roleSelect = self.$settingsForm.find('#wpsr_wp_user_signup_role');

            if($j(event.target).is(':checked'))
            {
                $roleSelect.parents('tr.alternate').removeClass('wpsr-hidden');
            }

            if(!$j(event.target).is(':checked'))
            {
                $roleSelect.parents('tr.alternate').addClass('wpsr-hidden');
            }
        }
    };
};