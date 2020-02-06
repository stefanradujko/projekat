
        (function($,W,D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#form").validate({
                        rules: {
                            proizvodNaziv: {
                                required: true,
                                minlength: 2,
                                maxlength: 100
                            },
                            proizvodjac: {
                                required: true
                            },
                            brojSerije: {
                                required: true,
                                minlength: 1,
                                maxlength: 10,
                                number: true
                            },
                            proizvodTiraz: {
                                required: true,
                                minlength: 1,
                                maxlength: 10,
                                number: true
                            },
                            proizvodCena: {
                                required: true,
                                minlength: 1,
                                maxlength: 10,
                                number: true

                            },
                            proizvodStanje: {
                                required: true,
                                minlength: 1,
                                maxlength: 10,
                                number: true

                            }
                        },
                        messages: {
                            proizvodNaziv: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 2 karaktera!",
                                maxlength: "Polje može imati maksimum 100 karaktera!"
                            },
                            proizvodjac: {
                                required: "Polje je obavezno!"
                            },
                            brojSerije: {
                                required: "Polje je obavezno!" ,
                                minlength: "Polje mora imati minimum 1 karaktera!",
                                maxlength: "Polje može imati maksimum 10 karaktera!",
                                number: "Morate uneti brojeve!"
                            },
                            proizvodTiraz: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 1 karaktera!",
                                maxlength: "Polje može imati maksimum 10 karaktera!",
                                number: "Morate uneti brojeve!"
                            },
                            proizvodCena: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 1 karaktera!",
                                maxlength: "Polje može imati maksimum 10 karaktera!",
                                number: "Morate uneti brojeve!"
                            },
                            proizvodStanje: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 1 karaktera!",
                                maxlength: "Polje može imati maksimum 10 karaktera!",
                                number: "Morate uneti brojeve!"
                            }
                        },
                        submitHandler: function(form) {
                            form.submit();
                        }
                    });
                }
            }
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation();
            });
        })(jQuery, window, document);
  
   