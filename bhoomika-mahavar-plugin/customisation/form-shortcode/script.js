(function($) {

    "use strict";

    var Bhoomika_Mahavar_Form_ShortCode = {

        /**
         *  Form Submit Script
         *  ------------------
         */
        form_submit : function(){

            if( $( '#bhoomika_mahavar_add_emp_form' ).length ){

                $( "#bhoomika_mahavar_add_emp_form" ).on( 'submit', function( e ){

                    /**
                     *  Handler
                     *  -------
                     */
                    var     _this       =   $(this),

                            _form       =    $( _this ).attr( 'id' ),

                            _form_id    =    '#'  + _form;
                    
                        
                        /**
                         *  Event Start
                         *  -----------
                         */
                        e.preventDefault();

                        /**
                         *  Ajax Start
                         *  ----------
                         */
                        $.ajax({

                            method      :   'POST',
                            
                            url         :   BHOOMIKA_MAHAVAR_AJAX_OBJ.ajax_url,
                            
                            data        :   { 

                                /**
                                 *  Action + Security
                                 *  -----------------
                                 */
                                'action'      :  'bhoomika_mahavar_add_emp_form_ajax_action',

                                /**
                                 *  Args
                                 *  ----
                                 */
                                'title'       :   $( '#title' ).val(),

                                'content'     :   $( '#content' ).val(),
                            },

                            beforeSend: function(){

                                console.log( 'I am in AJAX' );
                            },

                            complete: function(){

                                console.log( 'I am in AJAX with Completed Script' );
                            },

                            success: function( PHP_RESPONSE ){

                                console.log( 'DONE - What i GET IN AJAX' );
                                
                                console.log( PHP_RESPONSE );
                            },

                            error: function(jqXHR, textStatus, errorThrown) {

                                console.log( jqXHR );

                                console.log( textStatus );

                                console.log( errorThrown );
                            },

                        } );
                } );
            }
        },

        /** 
         *  Number of Function used in Budget Category
         *  ------------------------------------------
         */
        init: function() {

            /**
             *  Form Submit Script
             *  ------------------
             */
            this.form_submit();
        },
    };

    $(document).ready( function() {  Bhoomika_Mahavar_Form_ShortCode.init(); });

})(jQuery);