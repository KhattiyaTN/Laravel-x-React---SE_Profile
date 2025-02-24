import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { usePage } from '@inertiajs/react';

export default function TableIndex() {
    const { type, data } = usePage().props;

    return (
        <AuthenticatedLayout>
            <h2 className="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                type = {type ? type : 'ว่าง'} | data = {data ? data : 'ว่าง'}
            </h2>
        </AuthenticatedLayout>
    )
}
