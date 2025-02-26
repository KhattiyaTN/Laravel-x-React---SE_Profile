import React from 'react';
import { useState, useRef } from 'react';
import { Head, useForm } from '@inertiajs/react';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import AreaInput from '@/Components/AreaInput';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function BadgeFormIndex() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        image: '',
        type: '',
        date: '',
        description: ''
    });

    const [preview, setPreview] = useState(null);
    const textAreaRef = useRef();

    const handleImageChange = (e) => {
        const file = e.target.files[0];
        if (file) {
            setData('image', file);
            const reader = new FileReader();
            reader.onloadend = () => {
                setPreview(reader.result);
            }
            reader.readAsDataURL(file);
        }
    }

    const handleSubmit = (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append('name', data.name);
        formData.append('image', data.image);
        formData.append('type', data.type);
        formData.append('date', data.date);
        formData.append('description', data.description);

        post(route('badge.store'), {
            data: formData,
            headers: { 'Content-Type': 'multipart/form-data' },
        });
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight uppercase">
                    Badge create
                </h2>
            }
        >
            <Head title="Badge create" />

            <div className="flex min-h-screen flex-col justify-center items-center">
                <div className="w-full overflow-hidden px-6 py-4 -mt-36 shadow-md sm:max-w-md sm:rounded-lg bg-card shadow-primary">
                    <form onSubmit={handleSubmit} className="flex-row space-y-3">
                        {/* หัวข้อ */}
                        <div className='flex justify-center'>
                            <h3 className="text-xl font-bold uppercase text-primary">
                                New Badge
                            </h3>
                        </div>
                        {/* แสดงรูป */}
                        <div className="my-10 mb-20 flex justify-center">
                            {preview ? (
                                <img
                                    src={preview}
                                    alt="Preview"
                                    className="w-20 h-20 object-cover rounded-md"
                                />
                            ) : (
                                <img
                                    src="/default.png"
                                    alt="Preview"
                                    className="w-20 h-20 object-cover"
                                />
                            )}
                        </div>
                        {/* รูปภาพ */}
                        <div>
                            <InputLabel htmlFor="image" value="" />
                            <input
                                id="image"
                                type="file"
                                name="image"
                                className="mt-10 block w-full"
                                placeholder="Image"
                                autoComplete="image"
                                onChange={handleImageChange}
                            />
                            <InputError message={errors.image} className="mt-2 text-primary" />
                        </div>
                        {/* ชื่อ */}
                        <div>
                            <InputLabel htmlFor="name" value="" />
                            <TextInput
                                id="name"
                                type="text"
                                name="name"
                                value={data.name}
                                className="mt-1 block w-full"
                                placeholder="Name"
                                autoComplete="name"
                                isFocused={true}
                                onChange={(e) => setData('name', e.target.value)}
                            />
                            <InputError message={errors.name} className="mt-2 text-primary" />
                        </div>
                        {/* ชนิด */}
                        <div>
                            <InputLabel htmlFor="type" value="" />
                            <TextInput
                                id="type"
                                type="text"
                                name="type"
                                value={data.type}
                                className="mt-1 block w-full"
                                placeholder="Type"
                                autoComplete="type"
                                isFocused={false}
                                onChange={(e) => setData('type', e.target.value)}
                            />
                            <InputError message={errors.type} className="mt-2 text-primary" />
                        </div>
                        {/* วันที่ */}
                        <div>
                            <InputLabel htmlFor="date" value="" />
                            <TextInput
                                id="date"
                                type="date"
                                name="date"
                                value={data.date}
                                className="mt-1 block w-full"
                                autoComplete="date"
                                isFocused={false}
                                onChange={(e) => setData('date', e.target.value)}
                            />
                            <InputError message={errors.date} className="mt-2 text-primary" />
                        </div>
                        {/* รายละเอียด */}
                        <div>
                            <InputLabel htmlFor="description" value="" />
                            <AreaInput
                                id="description"
                                name="description"
                                placeholder="Enter your description..."
                                rows={3}
                                className="mt-1 block w-full"
                                value={data.description}
                                onChange={(e) => setData('description', e.target.value)} 
                            />
                            <InputError message={errors.description} className="mt-2 text-primary" />
                        </div>
                        {/* Submit button */}
                        <PrimaryButton className="mt-16" disabled={processing}>
                            Create
                        </PrimaryButton>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}
