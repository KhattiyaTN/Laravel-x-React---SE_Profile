import ClassLogo from '@/Components/ClassLogo';
import Dropdown from '@/Components/Dropdown';
import NavLink from '@/Components/NavLink';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink';
import { Link, usePage } from '@inertiajs/react';
import { useState } from 'react';

export default function AuthenticatedLayout({ header, children }) {
    const user = usePage().props.auth.user;

    console.log(JSON.stringify(user, null, 2));

    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);

    return (
        <div className="min-h-screen bg-secondary">
            <nav className="sticky top-0 z-50 w-full border-b border-primary bg-primary">
                <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div className="flex h-20 justify-between">
                        {/* Logo and name page */}
                        <div className="flex shrink-0 items-center">
                            <Link href="/">
                                <ClassLogo className="block h-14 w-auto fill-current" />
                            </Link>
                            {header && (
                                <header className="text-headerText">
                                    <div className="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                                        {header}
                                    </div>
                                </header>
                            )}
                        </div>
                        {/* Navigation and Button */}
                        <div className='flex'>
                            {/* Navigation */}
                            <div className="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink
                                    href={route('dashboard')}
                                    active={route().current('dashboard')}>
                                    Profile
                                </NavLink>
                                <NavLink
                                    href={route('badge.index')}
                                    active={route().current('badge.index')}>
                                    Badge
                                </NavLink>
                                <NavLink
                                    href={route('certificate.index')}
                                    active={route().current('certificate.index')}>
                                    Certificate
                                </NavLink>
                                <NavLink
                                    href={route('project.index')}
                                    active={route().current('project.index')}>
                                    Project
                                </NavLink>
                                <NavLink
                                    href={route('soft_skill.index')}
                                    active={route().current('soft_skill.index')}>
                                    Softskill
                                </NavLink>
                            </div>
                            {/* Button dropdown */}
                            <div className="hidden sm:ms-6 sm:flex sm:items-center">
                                <div className="relative ms-3">
                                    <Dropdown>
                                        {/* ปุ่มเปิดเมนู */}
                                        <Dropdown.Trigger>
                                            <span className="inline-flex rounded-md">
                                                <button
                                                    type="button"
                                                    className="inline-flex items-center rounded-md border border-transparent bg-secondary px-3 py-2 text-sm font-medium leading-4 text-hover transition duration-150 ease-in-out hover:text-hover focus:outline-none"
                                                >
                                                    {user.firstname}
                                                    <svg
                                                        className="-me-0.5 ms-2 h-4 w-10"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path
                                                            fillRule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clipRule="evenodd"
                                                        />
                                                    </svg>
                                                </button>
                                            </span>
                                        </Dropdown.Trigger>

                                        {/* Dropdown เมนู */}
                                        <Dropdown.Content>
                                            <Dropdown.Link
                                                href={route('profile.edit')}>
                                                Profile
                                            </Dropdown.Link>
                                            <Dropdown.Link
                                                href={route('logout')}
                                                method="post"
                                                as="button">
                                                Log Out
                                            </Dropdown.Link>
                                        </Dropdown.Content>
                                    </Dropdown>
                                </div>
                            </div>
                        </div>

                        <div className="-me-2 flex items-center sm:hidden">
                            <button
                                onClick={() =>
                                    setShowingNavigationDropdown(
                                        (previousState) => !previousState,
                                    )
                                }
                                className="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400"
                            >
                                <svg
                                    className="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        className={
                                            !showingNavigationDropdown
                                                ? 'inline-flex'
                                                : 'hidden'
                                        }
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        className={
                                            showingNavigationDropdown
                                                ? 'inline-flex'
                                                : 'hidden'
                                        }
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div
                    className={
                        (showingNavigationDropdown ? 'block' : 'hidden') +
                        ' sm:hidden'
                    }
                >
                    <div className="space-y-1 pb-3 pt-2">
                        <ResponsiveNavLink
                            href={route('dashboard')}
                            active={route().current('dashboard')}>
                            Profile
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            href={route('badge.index')}
                            active={route().current('badge.index')}>
                            Badge
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            href={route('certificate.index')}
                            active={route().current('certificate.index')}>
                            Certificate
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            href={route('project.index')}
                            active={route().current('project.index')}>
                            Project
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            href={route('soft_skill.index')}
                            active={route().current('soft_skill.index')}>
                            Skill
                        </ResponsiveNavLink>
                    </div>

                    <div className="border-t border-gray-200 pb-1 pt-4 dark:border-gray-600">
                        <div className="px-4">
                            <div className="text-base font-medium text-gray-800 dark:text-gray-200">
                                {user.name}
                            </div>
                            <div className="text-sm font-medium text-gray-500">
                                {user.email}
                            </div>
                        </div>

                        <div className="mt-3 space-y-1">
                            <ResponsiveNavLink
                                href={route('profile.edit')}>
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                method="post"
                                href={route('logout')}
                                as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <main className='mt-10'>{children}</main>
        </div>
    );
}
