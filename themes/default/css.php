<?php

//set the content type
header("Content-Type: text/css; charset=utf-8");

//add the css
$css = <<<EOD

/* Modern Reset */
*, *::before, *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* System Fonts */
:root {
  --system-font: -apple-system, BlinkMacSystemFont, "SF Pro Text", "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  --display-font: -apple-system, BlinkMacSystemFont, "SF Pro Display", "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  
  /* Tathya Technologies Brand Colors */
  --primary: #2563EB;
  --primary-dark: #1D4ED8;
  --primary-light: #3B82F6;
  --secondary: #64748B;
  --accent: #F59E0B;
  --success: #10B981;
  --danger: #EF4444;
  --warning: #F59E0B;
  --info: #06B6D4;
  
  /* Modern Color Palette */
  --background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  --background-alt: #F8FAFC;
  --surface: rgba(255, 255, 255, 0.95);
  --surface-dark: rgba(15, 23, 42, 0.95);
  --surface-elevated: rgba(255, 255, 255, 0.98);
  --border: rgba(148, 163, 184, 0.2);
  --border-strong: rgba(148, 163, 184, 0.4);
  --text: #0F172A;
  --text-secondary: #64748B;
  --text-muted: #94A3B8;
  --text-inverse: #FFFFFF;
  
  /* Shadows */
  --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
  
  /* Spacing */
  --spacing-xs: 4px;
  --spacing-sm: 8px;
  --spacing-md: 16px;
  --spacing-lg: 24px;
  --spacing-xl: 32px;
  --spacing-2xl: 48px;
  --spacing-3xl: 64px;
  
  /* Border Radius */
  --radius-sm: 4px;
  --radius-md: 8px;
  --radius-lg: 12px;
  --radius-xl: 16px;
  --radius-2xl: 24px;
  --radius-full: 9999px;
  
  /* Animation */
  --transition-fast: 150ms;
  --transition-base: 200ms;
  --transition-slow: 300ms;
  --ease-out: cubic-bezier(0.16, 1, 0.3, 1);
  --ease-in-out: cubic-bezier(0.4, 0, 0.2, 1);
  --spring: cubic-bezier(0.68, -0.6, 0.32, 1.6);
  --bounce: cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

/* Base Styles */
body {
  font-family: var(--system-font);
  font-size: 15px;
  line-height: 1.6;
  color: var(--text);
  background: var(--background);
  background-attachment: fixed;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  overflow-x: hidden;
  min-height: 100vh;
}

/* Main Content Container */
.main-content {
  background: var(--background-alt);
  min-height: 100vh;
  position: relative;
}

/* Page Header */
.page-header {
  background: var(--surface-elevated);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border-bottom: 1px solid var(--border);
  padding: var(--spacing-lg) 0;
  margin-bottom: var(--spacing-xl);
  box-shadow: var(--shadow-sm);
}

.page-title {
  font-family: var(--display-font);
  font-size: 28px;
  font-weight: 700;
  color: var(--text);
  margin: 0;
  letter-spacing: -0.025em;
}

.page-subtitle {
  color: var(--text-secondary);
  font-size: 16px;
  margin-top: var(--spacing-xs);
  font-weight: 400;
}

/* Typography */
h1, h2, h3, h4, h5, h6 {
  font-family: var(--display-font);
  font-weight: 600;
  line-height: 1.2;
  margin-bottom: var(--spacing-md);
}

h1 { font-size: 32px; }
h2 { font-size: 28px; }
h3 { font-size: 24px; }
h4 { font-size: 20px; }
h5 { font-size: 18px; }
h6 { font-size: 16px; }

/* Glass Morphism */
.glass-panel {
  background: var(--surface);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border: 1px solid var(--border);
  border-radius: var(--radius-xl);
  box-shadow: var(--shadow-lg);
  transition: 
    transform var(--transition-base) var(--spring),
    box-shadow var(--transition-base) var(--ease-out),
    border-color var(--transition-fast) var(--ease-out);
  position: relative;
  overflow: hidden;
}

.glass-panel::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
  opacity: 0;
  transition: opacity var(--transition-base) var(--ease-out);
}

.glass-panel:hover {
  transform: translateY(-4px) scale(1.02);
  box-shadow: var(--shadow-2xl);
  border-color: var(--border-strong);
}

.glass-panel:hover::before {
  opacity: 1;
}

/* Enhanced Card Styles */
.card {
  @extend .glass-panel;
  padding: var(--spacing-xl);
  margin-bottom: var(--spacing-lg);
}

.card-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: var(--spacing-lg);
  padding-bottom: var(--spacing-md);
  border-bottom: 1px solid var(--border);
}

.card-title {
  font-family: var(--display-font);
  font-size: 20px;
  font-weight: 600;
  color: var(--text);
  margin: 0;
}

.card-actions {
  display: flex;
  gap: var(--spacing-sm);
}

/* Modern Navigation */
#menu_container {
  height: 64px;
  background: var(--surface-elevated);
  backdrop-filter: blur(24px);
  -webkit-backdrop-filter: blur(24px);
  border-bottom: 1px solid var(--border);
  position: sticky;
  top: 0;
  z-index: 1000;
  transition: all var(--transition-base) var(--ease-out);
  box-shadow: var(--shadow-sm);
}

.navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 100%;
  padding: 0 var(--spacing-xl);
  max-width: 1200px;
  margin: 0 auto;
}

.navbar-brand {
  display: flex;
  align-items: center;
  gap: var(--spacing-md);
  font-family: var(--display-font);
  font-size: 20px;
  font-weight: 700;
  color: var(--text);
  text-decoration: none;
  transition: color var(--transition-fast) var(--ease-out);
}

.navbar-brand:hover {
  color: var(--primary);
}

.navbar-brand img {
  height: 32px;
  width: auto;
}

.navbar-nav {
  display: flex;
  align-items: center;
  gap: var(--spacing-sm);
  list-style: none;
  margin: 0;
  padding: 0;
}

.nav-item {
  position: relative;
}

.nav-link {
  display: flex;
  align-items: center;
  gap: var(--spacing-xs);
  padding: var(--spacing-sm) var(--spacing-md);
  color: var(--text-secondary);
  text-decoration: none;
  font-weight: 500;
  border-radius: var(--radius-md);
  transition: all var(--transition-fast) var(--ease-out);
  position: relative;
  overflow: hidden;
}

.nav-link::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: var(--primary);
  opacity: 0;
  transform: scaleX(0);
  transform-origin: left;
  transition: all var(--transition-base) var(--spring);
  z-index: -1;
}

.nav-link:hover {
  color: var(--text-inverse);
  transform: translateY(-1px);
}

.nav-link:hover::before {
  opacity: 1;
  transform: scaleX(1);
}

.nav-link.active {
  color: var(--primary);
  background: rgba(37, 99, 235, 0.1);
}

/* Dropdown Menus */
.dropdown {
  position: relative;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  right: 0;
  background: var(--surface-elevated);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-xl);
  min-width: 200px;
  padding: var(--spacing-sm);
  opacity: 0;
  visibility: hidden;
  transform: translateY(-10px);
  transition: all var(--transition-base) var(--spring);
  z-index: 1001;
}

.dropdown:hover .dropdown-menu {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.dropdown-item {
  display: flex;
  align-items: center;
  gap: var(--spacing-sm);
  padding: var(--spacing-sm) var(--spacing-md);
  color: var(--text);
  text-decoration: none;
  border-radius: var(--radius-md);
  transition: all var(--transition-fast) var(--ease-out);
  margin-bottom: 2px;
}

.dropdown-item:hover {
  background: var(--primary);
  color: var(--text-inverse);
  transform: translateX(4px);
}

.dropdown-divider {
  height: 1px;
  background: var(--border);
  margin: var(--spacing-sm) 0;
}

/* Modern Buttons */
.btn {
  font-family: var(--system-font);
  font-size: 14px;
  font-weight: 600;
  padding: 12px 24px;
  border-radius: var(--radius-lg);
  border: none;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: var(--spacing-xs);
  transition: all var(--transition-fast) var(--ease-in-out);
  white-space: nowrap;
  user-select: none;
  min-height: 44px;
}

.btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
  transform: translateX(-100%);
  transition: transform var(--transition-slow) var(--ease-out);
}

.btn:hover::before {
  transform: translateX(100%);
}

.btn:active {
  transform: scale(0.96);
}

.btn:disabled {
  opacity: 0.6;
  cursor: not-allowed;
  transform: none !important;
}

/* Button Variants */
.btn-primary {
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
  color: var(--text-inverse);
  box-shadow: var(--shadow-md);
}

.btn-primary:hover {
  box-shadow: var(--shadow-lg);
  transform: translateY(-2px);
}

.btn-secondary {
  background: var(--surface);
  color: var(--text);
  border: 1px solid var(--border);
  box-shadow: var(--shadow-sm);
}

.btn-secondary:hover {
  background: var(--surface-elevated);
  border-color: var(--border-strong);
  transform: translateY(-1px);
}

.btn-success {
  background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
  color: var(--text-inverse);
  box-shadow: var(--shadow-md);
}

.btn-success:hover {
  box-shadow: var(--shadow-lg);
  transform: translateY(-2px);
}

.btn-danger {
  background: linear-gradient(135deg, var(--danger) 0%, #dc2626 100%);
  color: var(--text-inverse);
  box-shadow: var(--shadow-md);
}

.btn-danger:hover {
  box-shadow: var(--shadow-lg);
  transform: translateY(-2px);
}

.btn-warning {
  background: linear-gradient(135deg, var(--warning) 0%, #d97706 100%);
  color: var(--text-inverse);
  box-shadow: var(--shadow-md);
}

.btn-warning:hover {
  box-shadow: var(--shadow-lg);
  transform: translateY(-2px);
}

/* Button Sizes */
.btn-sm {
  padding: 8px 16px;
  font-size: 13px;
  min-height: 36px;
}

.btn-lg {
  padding: 16px 32px;
  font-size: 16px;
  min-height: 52px;
}

/* Icon Buttons */
.btn-icon {
  width: 44px;
  height: 44px;
  padding: 0;
  border-radius: var(--radius-full);
}

.btn-icon-sm {
  width: 36px;
  height: 36px;
}

.btn-icon-lg {
  width: 52px;
  height: 52px;
}

/* Modern Form Elements */
.form-group {
  margin-bottom: var(--spacing-lg);
}

.form-label {
  display: block;
  font-weight: 600;
  color: var(--text);
  margin-bottom: var(--spacing-xs);
  font-size: 14px;
}

.form-label.required::after {
  content: ' *';
  color: var(--danger);
}

input[type="text"],
input[type="password"],
input[type="email"],
input[type="number"],
input[type="tel"],
input[type="url"],
select,
textarea {
  font-family: var(--system-font);
  font-size: 15px;
  padding: 14px 16px;
  border-radius: var(--radius-lg);
  border: 2px solid var(--border);
  background: var(--surface);
  color: var(--text);
  transition: all var(--transition-fast) var(--ease-out);
  width: 100%;
  min-height: 48px;
  position: relative;
}

input[type="text"]:focus,
input[type="password"]:focus,
input[type="email"]:focus,
input[type="number"]:focus,
input[type="tel"]:focus,
input[type="url"]:focus,
select:focus,
textarea:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
  background: var(--surface-elevated);
  transform: translateY(-1px);
}

input[type="text"]:hover,
input[type="password"]:hover,
input[type="email"]:hover,
input[type="number"]:hover,
input[type="tel"]:hover,
input[type="url"]:hover,
select:hover,
textarea:hover {
  border-color: var(--border-strong);
}

input::placeholder,
textarea::placeholder {
  color: var(--text-muted);
  opacity: 1;
}

/* Input Groups */
.input-group {
  position: relative;
  display: flex;
  align-items: center;
}

.input-group-prepend,
.input-group-append {
  display: flex;
  align-items: center;
  padding: 0 var(--spacing-md);
  background: var(--background-alt);
  border: 2px solid var(--border);
  color: var(--text-secondary);
  font-size: 14px;
  font-weight: 500;
}

.input-group-prepend {
  border-right: none;
  border-radius: var(--radius-lg) 0 0 var(--radius-lg);
}

.input-group-append {
  border-left: none;
  border-radius: 0 var(--radius-lg) var(--radius-lg) 0;
}

.input-group input {
  border-radius: 0;
}

.input-group input:first-child {
  border-radius: var(--radius-lg) 0 0 var(--radius-lg);
}

.input-group input:last-child {
  border-radius: 0 var(--radius-lg) var(--radius-lg) 0;
}

/* Select Styling */
select {
  appearance: none;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
  background-position: right 12px center;
  background-repeat: no-repeat;
  background-size: 16px;
  padding-right: 40px;
}

/* Checkbox and Radio */
input[type="checkbox"],
input[type="radio"] {
  width: 20px;
  height: 20px;
  margin-right: var(--spacing-sm);
  accent-color: var(--primary);
}

/* Form Validation */
.form-control.is-valid {
  border-color: var(--success);
  box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
}

.form-control.is-invalid {
  border-color: var(--danger);
  box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
}

.valid-feedback {
  color: var(--success);
  font-size: 13px;
  margin-top: var(--spacing-xs);
}

.invalid-feedback {
  color: var(--danger);
  font-size: 13px;
  margin-top: var(--spacing-xs);
}

/* Search Input */
.search-input {
  position: relative;
}

.search-input::before {
  content: '🔍';
  position: absolute;
  left: 16px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--text-muted);
  z-index: 1;
}

.search-input input {
  padding-left: 48px;
}

/* Modern Tables */
.table-container {
  background: var(--surface);
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-md);
  margin: var(--spacing-lg) 0;
}

table.list {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  margin: 0;
}

table.list th {
  font-family: var(--display-font);
  font-weight: 700;
  font-size: 13px;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  text-align: left;
  padding: var(--spacing-lg) var(--spacing-xl);
  background: var(--background-alt);
  color: var(--text-secondary);
  border-bottom: 2px solid var(--border);
  position: sticky;
  top: 0;
  z-index: 10;
}

table.list td {
  padding: var(--spacing-lg) var(--spacing-xl);
  border-bottom: 1px solid var(--border);
  transition: all var(--transition-fast) var(--ease-out);
  vertical-align: middle;
}

table.list tr {
  transition: all var(--transition-fast) var(--ease-out);
}

table.list tr:hover {
  background: rgba(37, 99, 235, 0.02);
  transform: scale(1.001);
}

table.list tr:hover td {
  border-color: rgba(37, 99, 235, 0.1);
}

/* Table Actions */
.table-actions {
  display: flex;
  gap: var(--spacing-xs);
  align-items: center;
}

.table-actions .btn {
  padding: 6px 12px;
  font-size: 12px;
  min-height: 32px;
}

/* Responsive Table */
@media (max-width: 768px) {
  .table-container {
    overflow-x: auto;
  }
  
  table.list th,
  table.list td {
    padding: var(--spacing-md);
    white-space: nowrap;
  }
}

/* Modern Status Indicators */
.status-badge {
  display: inline-flex;
  align-items: center;
  padding: 6px 12px;
  border-radius: var(--radius-full);
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  transition: all var(--transition-fast) var(--spring);
  position: relative;
  overflow: hidden;
}

.status-badge::before {
  content: '';
  display: inline-block;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  margin-right: 8px;
  animation: pulse 2s infinite;
}

.status-online {
  background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
  color: var(--success);
  border: 1px solid rgba(16, 185, 129, 0.2);
}

.status-online::before {
  background: var(--success);
  box-shadow: 0 0 6px rgba(16, 185, 129, 0.4);
}

.status-offline {
  background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.1) 100%);
  color: var(--danger);
  border: 1px solid rgba(239, 68, 68, 0.2);
}

.status-offline::before {
  background: var(--danger);
  animation: none;
}

.status-warning {
  background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(217, 119, 6, 0.1) 100%);
  color: var(--warning);
  border: 1px solid rgba(245, 158, 11, 0.2);
}

.status-warning::before {
  background: var(--warning);
}

.status-info {
  background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(8, 145, 178, 0.1) 100%);
  color: var(--info);
  border: 1px solid rgba(6, 182, 212, 0.2);
}

.status-info::before {
  background: var(--info);
}

/* Dashboard Widgets */
.dashboard-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: var(--spacing-xl);
  margin: var(--spacing-xl) 0;
}

.widget {
  background: var(--surface);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border: 1px solid var(--border);
  border-radius: var(--radius-2xl);
  padding: var(--spacing-xl);
  box-shadow: var(--shadow-lg);
  transition: all var(--transition-base) var(--spring);
  position: relative;
  overflow: hidden;
}

.widget::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--primary), var(--accent));
  opacity: 0;
  transition: opacity var(--transition-base) var(--ease-out);
}

.widget:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: var(--shadow-2xl);
  border-color: var(--border-strong);
}

.widget:hover::before {
  opacity: 1;
}

.widget-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: var(--spacing-lg);
}

.widget-title {
  font-family: var(--display-font);
  font-size: 18px;
  font-weight: 700;
  color: var(--text);
  margin: 0;
}

.widget-icon {
  width: 48px;
  height: 48px;
  border-radius: var(--radius-lg);
  background: linear-gradient(135deg, var(--primary), var(--primary-dark));
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-inverse);
  font-size: 20px;
  box-shadow: var(--shadow-md);
}

.widget-content {
  color: var(--text-secondary);
  line-height: 1.6;
}

.widget-metric {
  font-size: 32px;
  font-weight: 800;
  color: var(--text);
  margin: var(--spacing-md) 0;
  font-family: var(--display-font);
}

.widget-metric-small {
  font-size: 24px;
  font-weight: 700;
}

.widget-trend {
  display: flex;
  align-items: center;
  gap: var(--spacing-xs);
  font-size: 14px;
  font-weight: 600;
}

.widget-trend.up {
  color: var(--success);
}

.widget-trend.down {
  color: var(--danger);
}

.widget-trend.neutral {
  color: var(--text-secondary);
}

/* Progress Bars */
.progress {
  width: 100%;
  height: 8px;
  background: var(--border);
  border-radius: var(--radius-full);
  overflow: hidden;
  margin: var(--spacing-md) 0;
}

.progress-bar {
  height: 100%;
  background: linear-gradient(90deg, var(--primary), var(--primary-light));
  border-radius: var(--radius-full);
  transition: width var(--transition-slow) var(--ease-out);
  position: relative;
}

.progress-bar::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
  animation: shimmer 2s infinite;
}

/* Charts Container */
.chart-container {
  background: var(--surface);
  border-radius: var(--radius-xl);
  padding: var(--spacing-xl);
  margin: var(--spacing-lg) 0;
  box-shadow: var(--shadow-md);
  position: relative;
  min-height: 300px;
}

/* Message Container */
#message_container {
  position: fixed;
  top: var(--spacing-lg);
  right: var(--spacing-lg);
  z-index: 1000;
  max-width: 400px;
  transition: all var(--transition-base) var(--spring);
}

.message_text {
  padding: var(--spacing-md);
  margin-bottom: var(--spacing-sm);
  border-radius: 8px;
  background: var(--surface);
  box-shadow: 
    0 4px 6px rgba(0, 0, 0, 0.05),
    0 10px 15px rgba(0, 0, 0, 0.025);
  animation: slideIn var(--transition-base) var(--spring);
}

/* Modern Animations */
@keyframes fadeIn {
  from { 
    opacity: 0;
    transform: translateY(20px) scale(0.95);
  }
  to { 
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

@keyframes slideIn {
  from { 
    transform: translateX(30px);
    opacity: 0;
  }
  to { 
    transform: translateX(0);
    opacity: 1;
  }
}

@keyframes slideUp {
  from { 
    transform: translateY(20px);
    opacity: 0;
  }
  to { 
    transform: translateY(0);
    opacity: 1;
  }
}

@keyframes pulse {
  0%, 100% {
    opacity: 1;
    transform: scale(1);
  }
  50% {
    opacity: 0.7;
    transform: scale(1.1);
  }
}

@keyframes shimmer {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(100%);
  }
}

@keyframes float {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}

@keyframes glow {
  0%, 100% {
    box-shadow: 0 0 5px rgba(37, 99, 235, 0.3);
  }
  50% {
    box-shadow: 0 0 20px rgba(37, 99, 235, 0.6);
  }
}

.animate-in {
  animation: fadeIn 0.6s var(--spring);
}

.slide-in {
  animation: slideIn 0.5s var(--ease-out);
}

.slide-up {
  animation: slideUp 0.4s var(--ease-out);
}

.float {
  animation: float 3s ease-in-out infinite;
}

.glow {
  animation: glow 2s ease-in-out infinite;
}

/* Loading States */
.loading {
  position: relative;
  overflow: hidden;
}

.loading::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
  animation: shimmer 1.5s infinite;
}

.skeleton {
  background: linear-gradient(90deg, var(--border) 25%, rgba(255, 255, 255, 0.1) 50%, var(--border) 75%);
  background-size: 200% 100%;
  animation: shimmer 1.5s infinite;
  border-radius: var(--radius-md);
}

/* Login Page Styles */
.login-container {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--background);
  padding: var(--spacing-xl);
}

.login-card {
  background: var(--surface);
  backdrop-filter: blur(24px);
  -webkit-backdrop-filter: blur(24px);
  border: 1px solid var(--border);
  border-radius: var(--radius-2xl);
  padding: var(--spacing-3xl);
  box-shadow: var(--shadow-2xl);
  width: 100%;
  max-width: 400px;
  position: relative;
  overflow: hidden;
}

.login-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--primary), var(--accent));
}

.login-header {
  text-align: center;
  margin-bottom: var(--spacing-2xl);
}

.login-logo {
  width: 80px;
  height: 80px;
  margin: 0 auto var(--spacing-lg);
  background: linear-gradient(135deg, var(--primary), var(--primary-dark));
  border-radius: var(--radius-2xl);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-inverse);
  font-size: 32px;
  font-weight: 700;
  box-shadow: var(--shadow-lg);
}

.login-title {
  font-family: var(--display-font);
  font-size: 28px;
  font-weight: 800;
  color: var(--text);
  margin: 0 0 var(--spacing-xs);
}

.login-subtitle {
  color: var(--text-secondary);
  font-size: 16px;
  margin: 0;
}

.login-form {
  margin-bottom: var(--spacing-xl);
}

.login-form .form-group {
  margin-bottom: var(--spacing-lg);
}

.login-footer {
  text-align: center;
  padding-top: var(--spacing-lg);
  border-top: 1px solid var(--border);
  color: var(--text-secondary);
  font-size: 14px;
}

/* Enhanced Dark Mode */
@media (prefers-color-scheme: dark) {
  :root {
    --background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    --background-alt: #0f172a;
    --surface: rgba(30, 41, 59, 0.9);
    --surface-dark: rgba(15, 23, 42, 0.95);
    --surface-elevated: rgba(51, 65, 85, 0.9);
    --border: rgba(148, 163, 184, 0.1);
    --border-strong: rgba(148, 163, 184, 0.2);
    --text: #F8FAFC;
    --text-secondary: #CBD5E1;
    --text-muted: #64748B;
    --text-inverse: #0F172A;
  }

  .glass-panel,
  .widget,
  .card {
    box-shadow: 
      0 4px 6px rgba(0, 0, 0, 0.3),
      0 10px 15px rgba(0, 0, 0, 0.2);
  }

  .glass-panel:hover,
  .widget:hover {
    box-shadow: 
      0 20px 25px rgba(0, 0, 0, 0.4),
      0 10px 10px rgba(0, 0, 0, 0.3);
  }

  input[type="text"],
  input[type="password"],
  input[type="email"],
  input[type="number"],
  input[type="tel"],
  input[type="url"],
  select,
  textarea {
    background: rgba(51, 65, 85, 0.5);
    color: var(--text);
    border-color: rgba(148, 163, 184, 0.2);
  }

  input[type="text"]:focus,
  input[type="password"]:focus,
  input[type="email"]:focus,
  input[type="number"]:focus,
  input[type="tel"]:focus,
  input[type="url"]:focus,
  select:focus,
  textarea:focus {
    background: rgba(51, 65, 85, 0.8);
    border-color: var(--primary);
  }

  .table-container {
    background: rgba(30, 41, 59, 0.9);
  }

  table.list th {
    background: rgba(15, 23, 42, 0.8);
    color: var(--text-secondary);
  }

  table.list tr:hover {
    background: rgba(37, 99, 235, 0.05);
  }

  .login-card {
    background: rgba(30, 41, 59, 0.95);
    border-color: rgba(148, 163, 184, 0.2);
  }

  .navbar-brand,
  .nav-link {
    color: var(--text);
  }

  .nav-link:hover {
    color: var(--text-inverse);
  }
}

/* Enhanced Responsive Design */
@media (max-width: 1200px) {
  .navbar {
    padding: 0 var(--spacing-lg);
  }
  
  .dashboard-grid {
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  }
}

@media (max-width: 768px) {
  :root {
    --spacing-md: 12px;
    --spacing-lg: 16px;
    --spacing-xl: 24px;
    --spacing-2xl: 32px;
    --spacing-3xl: 40px;
  }

  body {
    font-size: 14px;
  }

  h1 { font-size: 24px; }
  h2 { font-size: 20px; }
  h3 { font-size: 18px; }
  h4 { font-size: 16px; }
  h5 { font-size: 15px; }
  h6 { font-size: 14px; }

  .page-title {
    font-size: 24px;
  }

  /* Mobile Navigation */
  #menu_container {
    height: 60px;
  }

  .navbar {
    padding: 0 var(--spacing-md);
    flex-direction: column;
    gap: var(--spacing-sm);
  }

  .navbar-nav {
    flex-wrap: wrap;
    justify-content: center;
  }

  .nav-link {
    padding: var(--spacing-xs) var(--spacing-sm);
    font-size: 13px;
  }

  /* Mobile Cards */
  .glass-panel,
  .widget,
  .card {
    border-radius: var(--radius-lg);
    margin: var(--spacing-sm);
    padding: var(--spacing-lg);
  }

  .widget-header {
    flex-direction: column;
    align-items: flex-start;
    gap: var(--spacing-sm);
  }

  .widget-metric {
    font-size: 28px;
  }

  /* Mobile Buttons */
  .btn {
    padding: 10px 16px;
    font-size: 14px;
    min-height: 44px;
  }

  .btn-sm {
    padding: 8px 12px;
    min-height: 36px;
  }

  /* Mobile Forms */
  input[type="text"],
  input[type="password"],
  input[type="email"],
  input[type="number"],
  input[type="tel"],
  input[type="url"],
  select,
  textarea {
    padding: 12px 14px;
    font-size: 16px; /* Prevents zoom on iOS */
  }

  /* Mobile Tables */
  .table-container {
    overflow-x: auto;
    border-radius: var(--radius-lg);
  }

  table.list th,
  table.list td {
    padding: var(--spacing-sm) var(--spacing-md);
    white-space: nowrap;
  }

  /* Mobile Dashboard */
  .dashboard-grid {
    grid-template-columns: 1fr;
    gap: var(--spacing-lg);
  }

  /* Mobile Login */
  .login-container {
    padding: var(--spacing-lg);
  }

  .login-card {
    padding: var(--spacing-2xl);
    max-width: none;
  }

  .login-logo {
    width: 64px;
    height: 64px;
    font-size: 24px;
  }

  .login-title {
    font-size: 24px;
  }

  /* Mobile Messages */
  #message_container {
    left: var(--spacing-sm);
    right: var(--spacing-sm);
    top: var(--spacing-sm);
    max-width: none;
  }
}

@media (max-width: 480px) {
  :root {
    --spacing-lg: 12px;
    --spacing-xl: 16px;
    --spacing-2xl: 24px;
  }

  .navbar {
    padding: 0 var(--spacing-sm);
  }

  .glass-panel,
  .widget,
  .card {
    margin: var(--spacing-xs);
    padding: var(--spacing-md);
  }

  .login-card {
    padding: var(--spacing-xl);
  }
}

/* Utility Classes */
.text-center { text-align: center; }
.text-left { text-align: left; }
.text-right { text-align: right; }

.d-none { display: none; }
.d-block { display: block; }
.d-flex { display: flex; }
.d-grid { display: grid; }

.flex-column { flex-direction: column; }
.flex-row { flex-direction: row; }
.align-items-center { align-items: center; }
.justify-content-center { justify-content: center; }
.justify-content-between { justify-content: space-between; }

.gap-xs { gap: var(--spacing-xs); }
.gap-sm { gap: var(--spacing-sm); }
.gap-md { gap: var(--spacing-md); }
.gap-lg { gap: var(--spacing-lg); }

.m-0 { margin: 0; }
.mt-auto { margin-top: auto; }
.mb-auto { margin-bottom: auto; }

.p-0 { padding: 0; }
.p-sm { padding: var(--spacing-sm); }
.p-md { padding: var(--spacing-md); }
.p-lg { padding: var(--spacing-lg); }

.w-100 { width: 100%; }
.h-100 { height: 100%; }

.text-primary { color: var(--primary); }
.text-secondary { color: var(--text-secondary); }
.text-muted { color: var(--text-muted); }
.text-success { color: var(--success); }
.text-danger { color: var(--danger); }
.text-warning { color: var(--warning); }

.bg-primary { background-color: var(--primary); }
.bg-surface { background-color: var(--surface); }

.border-radius-sm { border-radius: var(--radius-sm); }
.border-radius-md { border-radius: var(--radius-md); }
.border-radius-lg { border-radius: var(--radius-lg); }
.border-radius-xl { border-radius: var(--radius-xl); }

.shadow-sm { box-shadow: var(--shadow-sm); }
.shadow-md { box-shadow: var(--shadow-md); }
.shadow-lg { box-shadow: var(--shadow-lg); }

/* Print Styles */
@media print {
  * {
    background: white !important;
    color: black !important;
    box-shadow: none !important;
  }

  .glass-panel,
  .widget,
  .card {
    border: 1px solid #ccc !important;
    border-radius: 0 !important;
    backdrop-filter: none !important;
    -webkit-backdrop-filter: none !important;
  }

  #menu_container,
  .navbar,
  .btn,
  #message_container,
  .widget-icon,
  .dropdown-menu {
    display: none !important;
  }

  .page-title {
    font-size: 24px !important;
    margin-bottom: 20px !important;
  }

  table.list {
    border-collapse: collapse !important;
  }

  table.list th,
  table.list td {
    border: 1px solid #ccc !important;
    padding: 8px !important;
  }
}

/* Accessibility */
@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}

/* High Contrast Mode */
@media (prefers-contrast: high) {
  :root {
    --border: #000000;
    --border-strong: #000000;
    --text-secondary: #000000;
  }

  .btn {
    border: 2px solid currentColor;
  }

  input[type="text"],
  input[type="password"],
  input[type="email"],
  input[type="number"],
  input[type="tel"],
  input[type="url"],
  select,
  textarea {
    border: 2px solid #000000;
  }
}

EOD;
echo $css;
?>