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
        image: '',
        name: '',
        type: '',
        subject: '',
        stack: '',
        git: '',
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
        formData.append('image', data.image);
        formData.append('name', data.name);
        formData.append('type', data.type);
        formData.append('subject', data.issued_by);
        formData.append('stack', data.date);
        formData.append('git', data.date);
        formData.append('description', data.description);

        post(route('project.store'), {
            data: formData,
            headers: { 'Content-Type': 'multipart/form-data' },
        });
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight uppercase">
                    Project create
                </h2>
            }
        >
            <Head title="Project create" />

            <div className="flex min-h-screen flex-col justify-center items-center">
                <div className="w-full overflow-hidden px-6 py-4 -mt-16 shadow-md sm:max-w-md sm:rounded-lg bg-card shadow-primary">
                    <form onSubmit={handleSubmit} className="flex-row space-y-3">
                        {/* หัวข้อ */}
                        <div className='flex justify-center'>
                            <h3 className="text-xl font-bold uppercase text-primary">
                                New Class Project
                            </h3>
                        </div>
                        {/* แสดงรูป */}
                        <div className="my-10 mb-10 flex justify-center">
                            {preview ? (
                                <img
                                    src={preview}
                                    alt="Preview"
                                    className="w-40 h-30 object-cover rounded-md"
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
                                className="mt-5 block w-full"
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
                        {/* รหัสวิชา */}
                        <div>
                            <InputLabel htmlFor="subject" value="" />
                            <TextInput
                                id="subject"
                                type="text"
                                name="subject"
                                value={data.subject}
                                className="mt-1 block w-full"
                                placeholder="Subject ID"
                                autoComplete="subject"
                                isFocused={false}
                                onChange={(e) => setData('subject', e.target.value)}
                            />
                            <InputError message={errors.subject} className="mt-2 text-primary" />
                        </div>
                        {/* ภาษาที่ใช้ */}
                        <div>
                            <InputLabel htmlFor="stack" value="" />
                            <TextInput
                                id="stack"
                                type="text"
                                name="stack"
                                value={data.stack}
                                className="mt-1 block w-full"
                                placeholder="Stack"
                                autoComplete="stack"
                                isFocused={false}
                                onChange={(e) => setData('stack', e.target.value)}
                            />
                            <InputError message={errors.stack} className="mt-2 text-primary" />
                        </div>
                        {/* git */}
                        <div>
                            <InputLabel htmlFor="git" value="" />
                            <TextInput
                                id="git"
                                type="text"
                                name="git"
                                value={data.git != '' ? data.git : ''}
                                className="mt-1 block w-full"
                                placeholder="Github"
                                autoComplete="git"
                                isFocused={false}
                                onChange={(e) => setData('git', e.target.value)}
                            />
                            <InputError message={errors.git} className="mt-2 text-primary" />
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

