export default function Checkbox({ className = '', ...props }) {
    return (
        <input
            {...props}
            type="checkbox"
            className={
                'rounded-md shadow-sm focus:border-primary focus:ring-primary checked:bg-primary hover:bg-hover' +
                className
            }
        />
    );
}
