import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({
	attributes: {
		suffix,
		prefix
	}
}) {
	const blockProps = useBlockProps.save();

	return (
		<div { ...blockProps }>
			<div class="flex gap-[5px]">
				{ prefix && <span>{prefix}</span> }
				<span>{ new Date().getFullYear() }</span>
				{ suffix && <span>{suffix}</span> }
			</div>
		</div>
	);
}
