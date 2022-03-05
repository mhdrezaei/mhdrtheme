function onloadCallback (e) {
    var container0 = document.getElementById('recaptchafield0');
    if (container0 !== null) {
        var recaptcha0 = document.createElement('div')
        grecaptcha.render(recaptcha0, {
            'sitekey': keys.site_key
        });
        container0.appendChild(recaptcha0);
    }
    var container1 = document.getElementById('recaptchafield1');
    if (container1 !== null) {
        var recaptcha1 = document.createElement('div');
        grecaptcha.render(recaptcha1, {
            'sitekey': keys.site_key
        });

        container1.appendChild(recaptcha1);
    }
    var container2 = document.getElementById('recaptchafield2')
    if (container2 !== null) {
        var recaptcha2 = document.createElement('div');
        grecaptcha.render(recaptcha2, {
            'sitekey': keys.site_key
        })

        container2.appendChild(recaptcha2);
    }
    var container3 = document.getElementById('recaptchafield3');
    if (container3 !== null) {
        var recaptcha3 = document.createElement('div');
        grecaptcha.render(recaptcha3, {
            'sitekey': keys.site_key
        });

        container3.appendChild(recaptcha3);
    }
    var container4 = document.getElementById('recaptchafield4');
    if (container4 !== null) {
        var recaptcha4 = document.createElement('div')
        grecaptcha.render(recaptcha4, {
            'sitekey': keys.site_key
        })

        container4.appendChild(recaptcha4);
    }
}