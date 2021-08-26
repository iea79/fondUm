(function () {
    const tinkoffForm = $('.TinkoffPayForm'),
          sberForm = $('.sberPayForm');

    // let pdfSumm = '',
    //     pdfPaier = '',
    //     pdfPaierMail = '',
    //     pdfTitle = '',
    //     pdfInfo = '';

    setTinkofPayment();
    setSberForm();

    randomCustomerKey($('[name="customerKey"]'));
    randomCustomerKey($('[name="orderNumber"]'));

    $('.kvit-payment').on('click', function () {
    	$('.cart_payment_checkbox').hide();
    	$(this).closest('form').find('.cart_payment_checkbox input').removeAttr('required');
    });

    $('.cart-payment').on('click', function () {
    	$('.cart_payment_checkbox').show();
    	$(this).closest('form').find('.cart_payment_checkbox input').attr('required', true);
    });

    $('[type=submit]').on('click', function (e) {
    	e.preventDefault();

    	let form = $(this).closest('form'),
    		url = form.attr('action'),
    		formData = form.serialize();

        let empty = checkNoEmptyForm($(this));

    	if (empty === 0) {
            if (form.hasClass('TinkoffPayForm')) {
                console.log($('[name="paymentType"]').val());
                if ($('[name="paymentType"]:checked').val() === 'kvit') {
                    // Не карты
                    // console.log('Не карты');
                    setPdfDocument(form);
                    // pdfMake.createPdf(docInfo).download('name.pdf');
                    // pdfMake.createPdf(docInfo).open();
                } else {
                    // console.log(form);
                    // console.log(document.querySelector('.TinkoffPayForm'));
                    pay(document.querySelector('.TinkoffPayForm')); return false;
                }
            }
            if (form.hasClass('sberPayForm')) {
                if ($('[name="paymentTypeSber"]:checked').val() === 'kvit') {
                    // Не карты
                    setPdfDocument(form);
                    // pdfMake.createPdf(docInfo).download('name.pdf');
                } else {
                    $.ajax({
                        url: '/wp-content/themes/fondUm/payment/sberGetOrder.php',
                        type: "POST",
                        dataType: "html",
                        data: formData,
                        success: function (response) {
                            console.log(response);
                            let json =  JSON.parse(response);

                            location.href = json.formUrl;

                        },
                        error: function (response) {
                            console.log(response);
                        }
                    });
                }
            }

    	}
    });

    function checkNoEmptyForm(el) {
        let form = el.closest('form'),
    		fields = form.find('[required]'),
    		privacy = form.find('[type="checkbox"][required]'),
    		empty = 0;


    	fields.each(function (index, el) {
    		if ($(this).val() === '') {
    			$(this).addClass('invalid');
    			empty++;
    		} else {
    			$(this).removeClass('invalid');
    		}
    	});
    	privacy.each(function (index, el) {
    		if ($(this).prop('checked') === false) {
    			$(this).addClass('invalid');
    			empty++;
    		} else {
    			$(this).removeClass('invalid');
    		}
    	});
        setTimeout(function () {
            // fields.removeClass('invalid');
        }, 3000);
        console.log(empty);
    	return empty;
    }

    function randomCustomerKey(selector, min = 100000, max = 999999) {
        // получить случайное число от (min-0.5) до (max+0.5)
        let rand = min + Math.random() * (max - min + 1);
        selector.val(Math.round(rand));
        // return Math.round(rand);
    }

    function setTinkofPayment() {
        const form = tinkoffForm,
            summ = form.find('[name="summ"]'),
            amount = form.find('[name="amount"]'),
            amountHandle = form.find('.amount__input'),
            reccurent = form.find('[name="reccurent"]'),
            reccurentPay = form.find('[name="reccurentPayment"]');

        summ.on('change', function() {
            if ($(this).prop('checked')) {
                amount.val($(this).val());
            }
            amountHandle.val('');
        });
        amountHandle.on('input', function() {
            amount.val($(this).val());
            summ.prop('checked', false);
        });
        reccurent.on('change', function() {
            if ($(this).prop('checked')) {
                reccurentPay.val($(this).val());
            }
        });
    }

    function setSberForm() {
        const form = sberForm,
            summ = form.find('[name="summSber"]'),
            amount = form.find('[name="amount"]'),
            amountHandle = form.find('.amount__input'),
            reccurent = form.find('[name="reccurentSber"]'),
            reccurentPay = form.find('[name="reccurentPayment"]');

        summ.on('change', function() {
            if ($(this).prop('checked')) {
                amount.val($(this).val());
            }
            amountHandle.val('');
        });
        amountHandle.on('input', function() {
            amount.val($(this).val() * 100);
            summ.prop('checked', false);
        });
        reccurent.on('change', function() {
            if ($(this).prop('checked')) {
                reccurentPay.val($(this).val());
            }
        });
    }

    function setPdfDocument(form) {
        let pdfSumm = form.find('[name="amount"]').val(),
            pdfPaier = form.find('[name="name"]').val(),
            pdfPaierTel = form.find('[name="phone"]').val(),
            pdfInfo = form.find('[name="info"]').val(),
            pdfTitle = form.find('[name="infoTitle"]').val(),
            pdfINN = form.find('[name="inn"]').val(),
            pdfKPP = form.find('[name="kpp"]').val(),
            pdfRS = form.find('[name="rs"]').val(),
            pdfKS = form.find('[name="ks"]').val(),
            pdfBank = form.find('[name="bank"]').val(),
            pdfBIK = form.find('[name="bik"]').val(),
            qrData = `ST00012|Name=${pdfTitle}|PersonalAcc=${pdfRS}|BIC=${pdfBIK}|CorrespAcc=${pdfKS}|KPP=${pdfKPP}|Purpose=${pdfInfo}|INN=${pdfINN}|LASTNAME=${pdfPaier}|Sum=${pdfSumm}|CATEGORY=6`;
            // qrData = `ST00012|Name=${pdfTitle}|PersonalAcc=40703810962000000018|BankName=Отделение "БАНК ТАТАРСТАН" № 8610 ПАО СБЕРБАНК|BIC=049205603|CorrespAcc=30101810600000000603|PayeeINN=1654029553|KPP=165501001|contract=89950077730|CHILDFIO=|Purpose=${pdfInfo}|CBC=|OKTMO=92701000|LASTNAME=${pdfPaier}|Sum=${pdfSumm}|CATEGORY=6`;

        if (form.hasClass('sberPayForm')) {
            pdfSumm = form.find('[name="amount"]').val() / 100;
        }

        let docInfo = {

        	info: {
        		title:'Квитанция на пожертвование',
        		author: pdfTitle,
        		subject: pdfInfo,
        	},

        	pageSize:'A4',
            pageMargins:[30,20,30,30],

        	content: [

        		{
        			table:{
        				widths:[160, '*'],

        				body:[
        					[
                                {
                                    text:'Извещение',
                                    fontSize: 11,
                                    margin: [5,10,40,40],
                                    alignment: 'right'
                                },
                                {
                                    layout: 'lightHorizontalLines',
                                    table: {
                                        widths: ['100%'],
                                        margin: [0, 0, 0, 0],

                                        body: [
                                            // Row table
                                            [
                                                {
                                                    stack: [
                                                        {
                                                            columns: [
                                                                {
                                                                    text: '',
                                                                    width: '50%',
                                                                    style: ['leftSmall']
                                                                },
                                                                {
                                                                    text: 'Форма №ПД-4',
                                                                    width: '50%',
                                                                    style: ['rightSmall']
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: pdfTitle,
                                                                    width: '100%',
                                                                    alignment: 'center',
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                },
                                            ],
                                            // Row table
                                            [
                                                {
                                                    stack: [
                                                        {
                                                            columns: [
                                                                {
                                                                    text: '(наименование получателя платежа)',
                                                                    width: '100%',
                                                                    style: ['centerSmall']
                                                                }
                                                            ],
                                                            columnGap: 10
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: `ИНН ${pdfINN} КПП ${pdfKPP}`,
                                                                    width: '50%',
                                                                    style: ['contentLine']
                                                                },
                                                                {
                                                                    text: pdfRS,
                                                                    width: '50%',
                                                                    style: ['contentLine']
                                                                }
                                                            ],
                                                        }
                                                    ]
                                                },
                                            ],
                                            // Row table
                                            [
                                                {
                                                    stack: [
                                                        {
                                                            columns: [
                                                                {
                                                                    text: '(инн получателя платежа)',
                                                                    width: '50%',
                                                                    style: ['leftSmall']
                                                                },
                                                                {
                                                                    text: '(номер счёта получателя платежа)',
                                                                    width: '50%',
                                                                    style: ['leftSmall']
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: `БИК ${pdfBIK} (${pdfBank})`,
                                                                    width: '100%',
                                                                    alignment: 'center',
                                                                    style: ['contentLine']
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                },
                                            ],
                                            // Row table
                                            [
                                                {
                                                    stack: [
                                                        {
                                                            columns: [
                                                                {
                                                                    text: '(наименование банка получателя платежа)',
                                                                    width: '100%',
                                                                    style: ['centerSmall']
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: 'Договор: '+pdfPaierTel+' ; Дополнительная информация: '+pdfInfo+'; ФИО: '+pdfPaier+' ',
                                                                    width: '100%',
                                                                    alignment: 'center',
                                                                    style: ['contentLine']
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                },
                                            ],
                                            // Row table
                                            [
                                                {
                                                    stack: [
                                                        {
                                                            columns: [
                                                                {
                                                                    text: '(назначение платежа)',
                                                                    width: '100%',
                                                                    style: ['centerSmall']
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: 'Сумма: '+pdfSumm+' руб. 00 коп.',
                                                                    width: '100%',
                                                                    alignment: 'center',
                                                                    style: ['contentLine']
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                },
                                            ],
                                            // Row table
                                            [
                                                {
                                                    stack: [
                                                        {
                                                            columns: [
                                                                {
                                                                    text: '(сумма платежа)',
                                                                    width: '100%',
                                                                    style: ['centerSmall']
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: 'С условиями приёма указанной в платёжном документе суммы, в т.ч. с суммой взимаемой платы за услуги',
                                                                    width: '100%',
                                                                    style: ['leftSmall'],
                                                                    margin: [0, 5, 0, 5]
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: 'банка, ознакомлен и согласен. ',
                                                                    width: '30%',
                                                                    style: ['leftSmall'],
                                                                    margin: [0, 4, 0, 0]
                                                                },
                                                                {
                                                                    text: 'Подпись плательщика ____________________/',
                                                                    width: '*',
                                                                    style: ['leftSmall'],
                                                                    margin: [0, 4, 0, 0]
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                },
                                            ]
                                        ]
                                    }
                                }
                            ],

                            [
                                {
                                    stack: [
                                        {
                                            text:'Квитанция',
                                            fontSize: 11,
                                            margin: [5,10,30,7],
                                            alignment: 'right'
                                        },
                                        {
                                            qr: qrData,
                                            fit: 155,
                                            margin: [0, 7, 0, 5],
                                            alignment: 'center'
                                        }
                                    ]
                                },
                                {
                                    layout: 'lightHorizontalLines',
                                    table: {
                                        widths: ['100%'],
                                        margin: [0, 0, 0, 0],

                                        body: [
                                            // Row table
                                            [
                                                {
                                                    stack: [
                                                        {
                                                            columns: [
                                                                {
                                                                    text: '',
                                                                    width: '50%',
                                                                    style: ['leftSmall']
                                                                },
                                                                {
                                                                    text: 'Форма №ПД-4',
                                                                    width: '50%',
                                                                    style: ['rightSmall']
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: pdfTitle,
                                                                    width: '100%',
                                                                    alignment: 'center',
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                },
                                            ],
                                            // Row table
                                            [
                                                {
                                                    stack: [
                                                        {
                                                            columns: [
                                                                {
                                                                    text: '(наименование получателя платежа)',
                                                                    width: '100%',
                                                                    style: ['centerSmall']
                                                                }
                                                            ],
                                                            columnGap: 10
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: `ИНН ${pdfINN} КПП ${pdfKPP}`,
                                                                    width: '50%',
                                                                    style: ['contentLine']
                                                                },
                                                                {
                                                                    text: pdfRS,
                                                                    width: '50%',
                                                                    style: ['contentLine']
                                                                }
                                                            ],
                                                        }
                                                    ]
                                                },
                                            ],
                                            // Row table
                                            [
                                                {
                                                    stack: [
                                                        {
                                                            columns: [
                                                                {
                                                                    text: '(инн получателя платежа)',
                                                                    width: '50%',
                                                                    style: ['leftSmall']
                                                                },
                                                                {
                                                                    text: '(номер счёта получателя платежа)',
                                                                    width: '50%',
                                                                    style: ['leftSmall']
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: `БИК ${pdfBIK} (${pdfBank})`,
                                                                    width: '100%',
                                                                    alignment: 'center',
                                                                    style: ['contentLine']
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                },
                                            ],
                                            // Row table
                                            [
                                                {
                                                    stack: [
                                                        {
                                                            columns: [
                                                                {
                                                                    text: '(наименование банка получателя платежа)',
                                                                    width: '100%',
                                                                    style: ['centerSmall']
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: 'Договор: '+pdfPaierTel+' ; Дополнительная информация: '+pdfInfo+'; ФИО: '+pdfPaier+' ',
                                                                    width: '100%',
                                                                    alignment: 'center',
                                                                    style: ['contentLine']
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                },
                                            ],
                                            // Row table
                                            [
                                                {
                                                    stack: [
                                                        {
                                                            columns: [
                                                                {
                                                                    text: '(назначение платежа)',
                                                                    width: '100%',
                                                                    style: ['centerSmall']
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: 'Сумма: '+pdfSumm+' руб. 00 коп.',
                                                                    width: '100%',
                                                                    alignment: 'center',
                                                                    style: ['contentLine']
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                },
                                            ],
                                            // Row table
                                            [
                                                {
                                                    stack: [
                                                        {
                                                            columns: [
                                                                {
                                                                    text: '(сумма платежа)',
                                                                    width: '100%',
                                                                    style: ['centerSmall']
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: 'С условиями приёма указанной в платёжном документе суммы, в т.ч. с суммой взимаемой платы за услуги',
                                                                    width: '100%',
                                                                    style: ['leftSmall'],
                                                                    margin: [0, 5, 0, 5]
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            columns: [
                                                                {
                                                                    text: 'банка, ознакомлен и согласен. ',
                                                                    width: '30%',
                                                                    style: ['leftSmall'],
                                                                    margin: [0, 4, 0, 0]
                                                                },
                                                                {
                                                                    text: 'Подпись плательщика ____________________/',
                                                                    width: '*',
                                                                    style: ['leftSmall'],
                                                                    margin: [0, 4, 0, 0]
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                },
                                            ]
                                        ]
                                    }
                                }
                            ],

        				],
        				// headerRows:1
        			}
        		},

        	],

            defaultStyle: {
                fontSize: 9,
                bold: false
            },

            styles: {
                leftSmall: {
                    fontSize: 6,
                    alignment: 'left'
                },
                rightSmall: {
                    fontSize: 6,
                    alignment: 'right'
                },
                centerSmall: {
                    fontSize: 6,
                    alignment: 'center'
                },
                contentLine: {
                    margin: [0, 5, 0, 0]
                }
            }
        };

        pdfMake.createPdf(docInfo).open();

    }

})();
