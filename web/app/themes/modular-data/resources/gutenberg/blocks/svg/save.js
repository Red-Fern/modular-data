import { useBlockProps } from '@wordpress/block-editor';

export default function save({
	attributes: {
		svgMarkup
	}
}) {
	const blockProps = useBlockProps.save();

	return (
		<div { ...blockProps }>
			{ svgMarkup && (
				<div className="svg-wrapper" dangerouslySetInnerHTML={{ __html: svgMarkup }} />
			)}
		</div>
	);
}
