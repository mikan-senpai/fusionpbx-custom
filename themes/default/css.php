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
  
  /* Colors */
  --primary: #1E90FF;
  --primary-dark: #1873CC;
  --success: #34C759;
  --danger: #FF3B30;
  --warning: #FF9500;
  --background: #F2F2F7;
  --surface: rgba(255, 255, 255, 0.8);
  --surface-dark: rgba(0, 0, 0, 0.8);
  --border: rgba(0, 0, 0, 0.1);
  --text: #000000;
  --text-secondary: #6C6C6C;
  
  /* Spacing */
  --spacing-xs: 4px;
  --spacing-sm: 8px;
  --spacing-md: 16px;
  --spacing-lg: 24px;
  --spacing-xl: 32px;
  
  /* Animation */
  --transition-fast: 100ms;
  --transition-base: 200ms;
  --transition-slow: 300ms;
  --ease-out: cubic-bezier(0.16, 1, 0.3, 1);
  --spring: cubic-bezier(0.68, -0.6, 0.32, 1.6);
}

/* Base Styles */
body {
  font-family: var(--system-font);
  font-size: 15px;
  line-height: 1.5;
  color: var(--text);
  background: var(--background);
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
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
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 1px solid var(--border);
  border-radius: 12px;
  box-shadow: 
    0 4px 6px rgba(0, 0, 0, 0.05),
    0 10px 15px rgba(0, 0, 0, 0.025);
  transition: 
    transform var(--transition-base) var(--spring),
    box-shadow var(--transition-base) var(--ease-out);
}

.glass-panel:hover {
  transform: translateY(-2px);
  box-shadow: 
    0 8px 12px rgba(0, 0, 0, 0.1),
    0 16px 24px rgba(0, 0, 0, 0.05);
}

/* Navigation */
#menu_container {
  height: 44px;
  background: var(--surface);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border-bottom: 1px solid var(--border);
  position: sticky;
  top: 0;
  z-index: 100;
  transition: transform var(--transition-base) var(--ease-out);
}

.menu-item {
  padding: var(--spacing-sm) var(--spacing-md);
  color: var(--text);
  text-decoration: none;
  transition: color var(--transition-fast) var(--ease-out);
  position: relative;
}

.menu-item::after {
  content: '';
  position: absolute;
  bottom: -1px;
  left: 50%;
  width: 0;
  height: 2px;
  background: var(--primary);
  transition: all var(--transition-base) var(--spring);
  transform: translateX(-50%);
}

.menu-item:hover::after {
  width: 100%;
}

/* Buttons */
.btn {
  font-family: var(--system-font);
  font-size: 15px;
  font-weight: 500;
  padding: 8px 16px;
  border-radius: 8px;
  border: none;
  transition: all var(--transition-fast) var(--spring);
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

.btn::after {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.2);
  opacity: 0;
  transform: translate(-50%, -50%) scale(0.5);
  transition: all var(--transition-fast) var(--ease-out);
}

.btn:active::after {
  opacity: 1;
  transform: translate(-50%, -50%) scale(2);
}

.btn-primary {
  background: var(--primary);
  color: white;
}

.btn-primary:hover {
  background: var(--primary-dark);
  transform: scale(0.98);
}

/* Form Elements */
input[type="text"],
input[type="password"],
input[type="number"],
select,
textarea {
  font-family: var(--system-font);
  font-size: 15px;
  padding: 12px;
  border-radius: 8px;
  border: 1px solid var(--border);
  background: white;
  transition: all var(--transition-fast) var(--ease-out);
  width: 100%;
}

input[type="text"]:focus,
input[type="password"]:focus,
input[type="number"]:focus,
select:focus,
textarea:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(30, 144, 255, 0.1);
}

/* Tables */
table.list {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  margin: var(--spacing-md) 0;
}

table.list th {
  font-weight: 600;
  text-align: left;
  padding: var(--spacing-sm) var(--spacing-md);
  border-bottom: 1px solid var(--border);
  background: rgba(0, 0, 0, 0.02);
}

table.list td {
  padding: var(--spacing-sm) var(--spacing-md);
  border-bottom: 1px solid var(--border);
  transition: background var(--transition-fast) var(--ease-out);
}

table.list tr:hover td {
  background: rgba(0, 0, 0, 0.01);
}

/* Status Indicators */
.status-badge {
  display: inline-flex;
  align-items: center;
  padding: 4px 12px;
  border-radius: 12px;
  font-size: 13px;
  font-weight: 500;
  transition: all var(--transition-fast) var(--spring);
}

.status-badge::before {
  content: '';
  display: inline-block;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  margin-right: 6px;
}

.status-online {
  background: rgba(52, 199, 89, 0.1);
  color: var(--success);
}

.status-online::before {
  background: var(--success);
}

.status-offline {
  background: rgba(255, 59, 48, 0.1);
  color: var(--danger);
}

.status-offline::before {
  background: var(--danger);
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

/* Animations */
@keyframes fadeIn {
  from { 
    opacity: 0;
    transform: scale(0.95);
  }
  to { 
    opacity: 1;
    transform: scale(1);
  }
}

@keyframes slideIn {
  from { 
    transform: translateX(20px);
    opacity: 0;
  }
  to { 
    transform: translateX(0);
    opacity: 1;
  }
}

@keyframes slideUp {
  from { 
    transform: translateY(10px);
    opacity: 0;
  }
  to { 
    transform: translateY(0);
    opacity: 1;
  }
}

.animate-in {
  animation: fadeIn var(--transition-base) var(--spring);
}

.slide-in {
  animation: slideIn var(--transition-base) var(--spring);
}

.slide-up {
  animation: slideUp var(--transition-base) var(--spring);
}

/* Dark Mode */
@media (prefers-color-scheme: dark) {
  :root {
    --background: #000000;
    --surface: rgba(30, 30, 30, 0.8);
    --surface-dark: rgba(255, 255, 255, 0.8);
    --border: rgba(255, 255, 255, 0.1);
    --text: #FFFFFF;
    --text-secondary: #8E8E93;
  }

  .glass-panel {
    box-shadow: 
      0 4px 6px rgba(0, 0, 0, 0.2),
      0 10px 15px rgba(0, 0, 0, 0.1);
  }

  input[type="text"],
  input[type="password"],
  input[type="number"],
  select,
  textarea {
    background: rgba(255, 255, 255, 0.05);
    color: var(--text);
  }

  table.list th {
    background: rgba(255, 255, 255, 0.05);
  }

  table.list tr:hover td {
    background: rgba(255, 255, 255, 0.02);
  }
}

/* Responsive Design */
@media (max-width: 768px) {
  :root {
    --spacing-md: 12px;
    --spacing-lg: 20px;
    --spacing-xl: 28px;
  }

  body {
    font-size: 14px;
  }

  h1 { font-size: 28px; }
  h2 { font-size: 24px; }
  h3 { font-size: 20px; }
  h4 { font-size: 18px; }
  h5 { font-size: 16px; }
  h6 { font-size: 14px; }

  #menu_container {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 50px;
    border-top: 1px solid var(--border);
    border-bottom: none;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 0 var(--spacing-sm);
  }

  .glass-panel {
    border-radius: 8px;
    margin: var(--spacing-sm);
  }

  .btn {
    padding: 8px 12px;
    font-size: 14px;
  }

  table.list th,
  table.list td {
    padding: var(--spacing-xs) var(--spacing-sm);
  }

  #message_container {
    left: var(--spacing-sm);
    right: var(--spacing-sm);
    top: var(--spacing-sm);
    max-width: none;
  }
}

/* Print Styles */
@media print {
  .glass-panel {
    box-shadow: none;
    border: 1px solid #000;
  }

  #menu_container,
  .btn,
  #message_container {
    display: none;
  }
}

EOD;
echo $css;
?>