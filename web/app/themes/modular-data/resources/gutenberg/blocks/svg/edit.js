import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextareaControl } from '@wordpress/components';
import DOMPurify from 'dompurify';

export default function Edit({
	attributes: {
		svgMarkup
	},
	setAttributes
}) {
	const blockProps = useBlockProps();

	// Sanitize the SVG markup
    const sanitizeSvgMarkup = (markup) => {
        return DOMPurify.sanitize(markup);
    };

	const handleOnChange = (newMarkup) => {
		const sanitizedMarkup = sanitizeSvgMarkup(newMarkup);

		setAttributes({ svgMarkup: sanitizedMarkup });
    };
	
	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'SVG', 'modular-data' ) }>
					<TextareaControl
						label={ __( 'Markup', 'modular-data' ) }
						value={ svgMarkup }
						onChange={handleOnChange}
                        placeholder={__( 'Paste SVG markup here', 'modular-data' )}
                        rows={10}
					/>
				</PanelBody>
			</InspectorControls>

			{ svgMarkup && (
				<div class="svg-wrapper" dangerouslySetInnerHTML={{ __html: svgMarkup }} />
			)}
		</div>
	);
}
