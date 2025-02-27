import React, { useState } from 'react';
import { router } from '@inertiajs/react';
import DataTable from 'react-data-table-component';
import { Eye, Pencil, Trash2 } from 'lucide-react';

const CustomDataTable = ({ type, data, onView, onEdit, onDelete }) => {
    const [filterText, setFilterText] = useState('');
    let columns = [];

    // กำหนดเส้นทางที่เหมาะสมตาม type
    const createRoute = {
        Badge: route('badge.create'),
        Certificate: route('certificate.create'),
        Project: route('project.create'),
        Skill: route('soft_skill.create'),
    }

    // Callback สำหรับปุ่มสร้างข้อมูลใหม่
    const handleCreate = () => {
        if (createRoute[type]) {
            router.visit(createRoute[type]);
        } else {
            console.error("ไม่มีเส้นทางสำหรับ : ", type);
        }
    }

    // จัดการช่องค้นหา
    const filteredData = data.filter(item => {
        return Object.values(item).some(value =>
            String(value).toLowerCase().includes(filterText.toLowerCase())
        );
    });

    // จัดสไตล์ตาราง
    const customStyles = {
        table: {
            style: {
                borderCollapse: 'separate',
                borderSpacing: '0 5px',
            },
        },
        headCells: {
            style: {
                backgroundColor: '#821131',
                color: '#FFFFFF',
                fontSize: '14px',
                fontWeight: 'bold',
                textTransform: 'uppercase',
                border: '1px solid #ddd',
            },
        },
        cells: {
            style: {
                fontSize: '14px',
            },
        },
        rows: {
            style: {
                '&:hover': {
                    backgroundColor: '#999999',
                },
            },
        },
        pagination: {
            style: {
                display: 'flex',
                justifyContent: 'center',
            },
        },
    };

    // เพิ่มเติมสไตล์
    const customPaginationStyles = {
        pagination: {
            style: {
                display: 'flex',
                justifyContent: 'space-between',
                alignItems: 'center',
            },
        },
        paginationComponentOptions: {
            style: {
                display: 'flex',
                justifyContent: 'flex-end',
            },
        },
    };
    const paginationComponentOptions = {
        rowsPerPageText: '',
        rangeSeparatorText: 'of',
        noRowsPerPage: true,
    };

    // จัดการปุ่มในคอลัมป์ Action
    const ActionButtons = ({ id, onView, onEdit, onDelete }) => (
        <div className="flex justify-center space-x-2">
            <button onClick={() => onView(id)} className="w-10 h-6 rounded-md bg-infoButton text-bodyText hover:bg-hover flex justify-center items-center">
                <Eye size={18}/>
            </button>
            <button onClick={() => onEdit(id)} className="w-10 h-6 rounded-md bg-warningButton text-bodyText hover:bg-hover flex justify-center items-center">
                <Pencil size={18} />
            </button>
            <button onClick={() => onDelete(id)} className="w-10 h-6 rounded-md bg-dangerButton text-bodyText hover:bg-hover flex justify-center items-center">
                <Trash2 size={18} />
            </button>
        </div>
    );

    // สร้าง columns ของ DataTable ตาม type ที่รับมา
    switch (type) {
        case 'Badge':
            columns = [
                {
                    name: 'Name',
                    selector: data => data.badge_name,
                    sortable: true,
                },
                {
                    name: 'Type',
                    selector: data => data.badge_type,
                    sortable: true,
                },
                {
                    name: 'Date',
                    selector: data => data.badge_date_awarded,
                    sortable: true,
                },
                {
                    name: 'Description',
                    selector: data => data.badge_description,
                    sortable: true,
                },
                {
                    name: 'Actions',
                    cell: data => <ActionButtons id={data.badge_id} onView={onView} onEdit={onEdit} onDelete={onDelete} />,
                },
            ];
            break;
        case 'Certificate':
            columns = [
                {
                    name: 'Name',
                    selector: data => data.cerf_name,
                    sortable: true,
                },
                {
                    name: 'Type',
                    selector: data => data.cerf_type,
                    sortable: true,
                },
                {
                    name: 'From',
                    selector: data => data.issued_by,
                    sortable: true,
                },
                {
                    name: 'Date',
                    selector: data => data.issue_date,
                    sortable: true,
                },
                {
                    name: 'Actions',
                    cell: data => <ActionButtons row={data.cerf_id} onView={onView} onEdit={onEdit} onDelete={onDelete} />,
                },
            ];
            break;
        case 'Project':
            columns = [
                {
                    name: 'Name',
                    selector: data => data.pro_name,
                    sortable: true,
                },
                {
                    name: 'Type',
                    selector: data => data.pro_type,
                    sortable: true,
                },
                {
                    name: 'Stack',
                    selector: data => data.pro_stack,
                    sortable: true,
                },
                {
                    name: 'Subject',
                    selector: data => data.sub_id,
                    sortable: true,
                },
                {
                    name: 'Actions',
                    cell: data => <ActionButtons row={data.pro_id} onView={onView} onEdit={onEdit} onDelete={onDelete} />,
                },
            ];
            break;
        case 'Skill':
            columns = [
                {
                    name: 'Name',
                    selector: data => data.skill_name,
                    sortable: true,
                },
                {
                    name: 'Type',
                    selector: data => data.skill_type,
                    sortable: true,
                },
                {
                    name: 'Date',
                    selector: data => data.skill_date,
                    sortable: true,
                },
                {
                    name: 'Description',
                    selector: data => data.skill_description,
                    sortable: true,
                },
                {
                    name: 'Actions',
                    cell: data => <ActionButtons row={data.skill_id} onView={onView} onEdit={onEdit} onDelete={onDelete} />,
                },
            ];
            break;
        default:
            columns = [
                {
                    name: 'ID',
                    selector: row => row.id,
                    sortable: true,
                },
                {
                    name: 'Name',
                    selector: row => row.name,
                    sortable: true,
                },
            ];
    }

    return (
        <div className="w-full">
            <div className='flex justify-between items-center mb-2'>
                {/* new */}
                <div className="w-1/3">
                    <button
                        className="py-2 w-60 rounded-xl uppercase bg-primary text-bodyText"
                        onClick={handleCreate}>
                        New
                    </button>
                </div>
                {/* แสดงชื่อ Table อยู่ตรงกลาง */}
                <div className='w-1/3 flex justify-center'>
                    <h1 className="text-2xl font-semibold text-center uppercase flex-grow">{type} Table</h1>
                </div>
                {/* ช่องค้นหา */}
                <div className='w-1/3 flex justify-end'>
                    <input
                        type="text"
                        placeholder="🔍 ค้นหา..."
                        className="p-2 w-60 border rounded-md focus:border-primary active:border-primary"
                        value={filterText}
                        onChange={e => setFilterText(e.target.value)}
                    />
                </div>
            </div>
            <DataTable
                title=""
                columns={columns}
                data={filteredData}
                pagination
                paginationPerPage={5}
                paginationComponentOptions={paginationComponentOptions}
                responsive
                customStyles={{ ...customStyles, ...customPaginationStyles }}
            />
        </div>
    );
};

export default CustomDataTable;