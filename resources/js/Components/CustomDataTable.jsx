import React from 'react';
import DataTable from 'react-data-table-component';

const CustomDataTable  = ({ type, data, onView, onEdit, onDelete }) => {
    let columns = [];

    // สร้าง columns ของ DataTable ตาม type ที่รับมา
    switch (type) {
        case 'Badge':
            columns = [
                {
                    name: 'Name',
                    selector: row => row.name,
                    sortable: true,
                },
                {
                    name: 'Type',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Description',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Date',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Actions',
                    cell: row => (
                        <div className="space-x-2">
                            <button onClick={() => onView(row)} className="text-blue-500">INFO</button>
                            <button onClick={() => onEdit(row)} className="text-green-500">FIX</button>
                            <button onClick={() => onDelete(row)} className="text-red-500">DELETE</button>
                        </div>
                    ),
                },
            ];
            break;
        case 'Certificate':
            columns = [
                {
                    name: 'Name',
                    selector: row => row.name,
                    sortable: true,
                },
                {
                    name: 'Type',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Description',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Date',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Actions',
                    cell: row => (
                        <div className="space-x-2">
                            <button onClick={() => onView(row)} className="text-blue-500">INFO</button>
                            <button onClick={() => onEdit(row)} className="text-green-500">FIX</button>
                            <button onClick={() => onDelete(row)} className="text-red-500">DELETE</button>
                        </div>
                    ),
                },
            ];
            break;
        case 'Project':
            columns = [
                {
                    name: 'Name',
                    selector: row => row.name,
                    sortable: true,
                },
                {
                    name: 'Type',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Description',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Stack',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Git',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Actions',
                    cell: row => (
                        <div className="space-x-2">
                            <button onClick={() => onView(row)} className="text-blue-500">INFO</button>
                            <button onClick={() => onEdit(row)} className="text-green-500">FIX</button>
                            <button onClick={() => onDelete(row)} className="text-red-500">DELETE</button>
                        </div>
                    ),
                },
            ];
            break;
        case 'Skill':
            columns = [
                {
                    name: 'Name',
                    selector: row => row.name,
                    sortable: true,
                },
                {
                    name: 'Type',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Description',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Date',
                    selector: row => row.level,
                    sortable: true,
                },
                {
                    name: 'Actions',
                    cell: row => (
                        <div className="space-x-2">
                            <button onClick={() => onView(row)} className="text-blue-500">INFO</button>
                            <button onClick={() => onEdit(row)} className="text-green-500">FIX</button>
                            <button onClick={() => onDelete(row)} className="text-red-500">DELETE</button>
                        </div>
                    ),
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
        // สร้าง DataTable โดยใช้ columns และ data ที่สร้างไว้
        <DataTable
            title={
                type === 'badge' ? 'Badges' :
                    type === 'certificate' ? 'Certificates' :
                        type === 'class_project' ? 'Class Projects' :
                            type === 'soft_skill' ? 'Soft Skills' : 'Data Table'
            }
            columns={columns}
            data={data}
            pagination
            responsive
        />
    );
};

export default CustomDataTable;