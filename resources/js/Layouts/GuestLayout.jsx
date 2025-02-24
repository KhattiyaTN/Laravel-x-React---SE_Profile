import ClassLogo from '@/Components/ClassLogo';
import UniversityLogo from '@/Components/UniversityLogo';
import { Link } from '@inertiajs/react';

export default function GuestLayout({ children }) {
    return (
        <>
            <div className="min-h-screen flex bg-secondary">
                {/* ส่วนซ้าย - 2/5 ของหน้าจอ */}
                <div className="w-full md:w-2/5 flex flex-col justify-center items-center p-6 bg-primary">
                    <Link href="/">
                        <ClassLogo className="size-60 fill-current" />
                    </Link>
                    <div className="text-center mt-6 text-headerText">
                        <h4 className="text-1xl font-bold mb-4 uppercase">Facalty of liberal artal arts and sciences</h4>
                        <h4 className="text-1xl font-bold mb-4 uppercase">Sisaket rajabhat university</h4>
                    </div>
                </div>

                {/* ส่วนขวา - 3/5 ของหน้าจอ */}
                <div className="w-full md:w-3/5 flex justify-center items-center">
                    <div className="flex min-h-screen flex-col justify-center items-center">
                        <div className="w-full overflow-hidden px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg bg-card shadow-primary">
                            <div className="flex justify-center mt-3 mb-6">
                                <Link href="/">
                                    <UniversityLogo className="w-15 h-20 fill-current" />
                                </Link>
                            </div>
                            {children}
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
