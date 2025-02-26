import React, { forwardRef } from 'react';

const AreaInput = forwardRef(({ className = '', ...props }, ref) => {
    return (
        <textarea
            ref={ref}
            className={`rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-primary dark:focus:ring-primary ${className}`}
            {...props}
        />
    );
});

AreaInput.displayName = 'AreaInput';

export default AreaInput;
