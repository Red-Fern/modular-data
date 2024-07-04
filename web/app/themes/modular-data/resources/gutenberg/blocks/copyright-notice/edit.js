import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';

export default function Edit({
	attributes: {
		prefix,
		suffix
	},
	setAttributes,
}) {
	const blockProps = useBlockProps();
	
	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Copyright Notice', 'modular-data' ) }>
					<TextControl
						label={ __( 'Prefix', 'modular-data' ) }
						value={ prefix }
						onChange={(value) => setAttributes({ prefix: value })}
					/>
					<TextControl
						label={ __( 'Suffix', 'modular-data' ) }
						value={ suffix }
						onChange={(value) => setAttributes({ suffix: value })}
					/>
				</PanelBody>
			</InspectorControls>

			<div className="flex gap-[5px]">
				{ prefix && <span>{prefix}</span> }
				<span>{ new Date().getFullYear() }</span>
				{ suffix && <span>{suffix}</span> }
			</div>
		</div>
	);
}
