/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	config.extraPlugins = 'imageresponsive,image2,widget,dialog,clipboard,lineutils,dialogui,widgetselection';
	config.easyimage_styles = {
		full: {
			// Changes just the class name, the label icon remains unchanged.
			attributes: {
				'class': 'my-custom-full-class'
			}
		},
	};
	
	config.on = {
		widgetDefinition: function( evt ) {
			if ( evt.data.name === 'easyimage' ) {
				widgetDef.progressReporterType = yourReporterClass;
			}
		}
	};
};

CKEDITOR.replace( 
	'editor', {
    extraPlugins: 'easyimage',
    removePlugins: 'image',
} );



// CKEDITOR.on('instanceReady', function (ev) {
//     ev.editor.dataProcessor.htmlFilter.addRules( {
//         elements : {
//             img: function( el ) {
//                 // Add bootstrap "img-responsive" class to each inserted image
//                 el.addClass('img-fluid');
        
//                 // Remove inline "height" and "width" styles and
//                 // replace them with their attribute counterparts.
//                 // This ensures that the 'img-responsive' class works
//                 var style = el.attributes.style;
        
//                 if (style) {
//                     // Get the width from the style.
//                     var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
//                         width = match && match[1];
        
//                     // Get the height from the style.
//                     match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
//                     var height = match && match[1];
        
//                     // Replace the width
//                     if (width) {
//                         el.attributes.style = el.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
//                         el.attributes.width = width;
//                     }
        
//                     // Replace the height
//                     if (height) {
//                         el.attributes.style = el.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
//                         el.attributes.height = height;
//                     }
//                 }
        
//                 // Remove the style tag if it is empty
//                 if (!el.attributes.style)
//                     delete el.attributes.style;
//             }
//         }
//     });
// });