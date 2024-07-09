import { useBlockProps } from '@wordpress/block-editor';

export default function save({
	attributes: {
		prefix,
		suffix
	}
}) {
	const blockProps = useBlockProps.save();

	return (
		<div { ...blockProps }>
			<div className="flex gap-[5px]">
				{ prefix && <span>{prefix}</span> }
				<span>{ new Date().getFullYear() }</span>
				{ suffix && <span>{suffix}</span> }
			</div>
		</div>
	);
}
