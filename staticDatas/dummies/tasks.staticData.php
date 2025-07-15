<?php
// Dummy static data for tasks table
return [
    [
        'project_id'   => '11111111-1111-1111-1111-111111111111', // Replace with actual project UUID
        'assigned_to'  => 1, // Replace with actual user ID
        'title'        => 'Design Landing Page',
        'description'  => 'Create responsive design for the marketing landing page.',
        'status'       => 'in_progress',
        'due_date'     => '2025-08-01',
    ],
    [
        'project_id'   => '11111111-1111-1111-1111-111111111111',
        'assigned_to'  => 2,
        'title'        => 'Implement Login System',
        'description'  => 'Build authentication using email and password.',
        'status'       => 'pending',
        'due_date'     => '2025-08-05',
    ],
    [
        'project_id'   => '22222222-2222-2222-2222-222222222222',
        'assigned_to'  => null,
        'title'        => 'Setup CI/CD Pipeline',
        'description'  => 'Configure GitHub Actions for automatic deployments.',
        'status'       => 'pending',
        'due_date'     => '2025-08-10',
    ],
    [
        'project_id'   => '22222222-2222-2222-2222-222222222222',
        'assigned_to'  => 3,
        'title'        => 'Database Schema Design',
        'description'  => 'Define schema for tasks, users, and projects tables.',
        'status'       => 'completed',
        'due_date'     => '2025-07-14',
    ],
];
