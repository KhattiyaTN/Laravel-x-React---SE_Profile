import { Head, usePage, router } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import CustomDataTable from '@/Components/CustomDataTable';

export default function TableIndex() {
    const { type, data } = usePage().props;

    // กำหนดเส้นทางที่เหมาะสมตาม type
    const showRoute = {
        Badge: (id) => route('badge.show', { badge: id }),
        Certificate: (id) => route('certificate.show', { certificate: id }),
        Project: (id) => route('project.show', { project: id }),
        Skill: (id) => route('soft_skill.show', { soft_skill: id }),
    }
    const editRoute = {
        Badge: (id) => route('badge.edit', { badge: id }),
        Certificate: (id) => route('certificate.edit', { certificate: id }),
        Project: (id) => route('project.edit', { project: id }),
        Skill: (id) => route('soft_skill.edit', { soft_skill: id }),
    }
    const destroyRoute = {
        Badge: (id) => route('badge.destroy', { badge: id }),
        Certificate: (id) => route('certificate.destroy', { certificate: id }),
        Project: (id) => route('project.destroy', { project: id }),
        Skill: (id) => route('soft_skill.destroy', { soft_skill: id }),
    }

    // ตัวอย่าง callback สำหรับ action buttons
    const handleView = (id) => {
        if (!type || !showRoute[type]) {
            console.error("showRoute Invalid type:", type);
            return;
        }
        if (!id) {
            console.error("showRoute Invalid ID:", id);
            return;
        }
        router.visit(showRoute[type](id));
    };
    const handleEdit = (id) => {
        if (!type || !editRoute[type]) {
            console.error("editRoute Invalid type:", type);
            return;
        }
        if (!id) {
            console.error("editRoute Invalid ID:", id);
            return;
        }
        router.visit(editRoute[type](id));
    };
    const handleDelete = (id) => {
        if (!type || !destroyRoute[type]) {
            console.error("IdestroyRoute nvalid type:", type);
            return;
        }
        if (!id) {
            console.error("destroyRoute Invalid ID:", id);
            return;
        }
        router.visit(destroyRoute[type](id));
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight uppercase">
                    {type}
                </h2>
            }
        >
            <Head title={type} />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <CustomDataTable
                        type={type} 
                        data={data}
                        onView={handleView}
                        onEdit={handleEdit}
                        onDelete={handleDelete}
                    />
                </div>
            </div>
        </AuthenticatedLayout>
    )
}
