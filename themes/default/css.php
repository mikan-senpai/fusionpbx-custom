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
}

/* Base Styles */
body {
  font-family: var(--system-font);
  font-size: 15px;
  line-height: 1.5;
  color: var(--text);
  background: var(--background);
  -webkit-font-smoothing: antialiased;
}

/* Typography */
h1, h2, h3, h4, h5, h6 {
  font-family: var(--display-font);
  font-weight: 600;
  line-height: 1.2;
}

/* Glass Morphism */
.glass-panel {
  background: var(--surface);
  backdrop-filter: blur(12px);
  border: 1px solid var(--border);
  border-radius: 12px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}

.glass-panel:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
}

/* Navigation */
#menu_container {
  height: 44px;
  background: var(--surface);
  backdrop-filter: blur(12px);
  border-bottom: 1px solid var(--border);
}

/* Buttons */
.btn {
  font-family: var(--system-font);
  font-size: 15px;
  font-weight: 500;
  padding: 8px 16px;
  border-radius: 8px;
  border: none;
  transition: all var(--transition-fast);
  cursor: pointer;
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
  padding: 8px 12px;
  border-radius: 8px;
  border: 1px solid var(--border);
  background: white;
  transition: border-color var(--transition-fast);
}

input[type="text"]:focus,
input[type="password"]:focus,
input[type="number"]:focus,
select:focus,
textarea:focus {
  outline: none;
  border-color: var(--primary);
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
}

table.list td {
  padding: var(--spacing-sm) var(--spacing-md);
  border-bottom: 1px solid var(--border);
}

/* Status Indicators */
.status-badge {
  display: inline-flex;
  align-items: center;
  padding: 4px 8px;
  border-radius: 12px;
  font-size: 13px;
  font-weight: 500;
}

.status-online {
  background: rgba(52, 199, 89, 0.1);
  color: var(--success);
}

.status-offline {
  background: rgba(255, 59, 48, 0.1);
  color: var(--danger);
}

/* Animations */
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideIn {
  from { transform: translateY(10px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}

.animate-in {
  animation: fadeIn var(--transition-base) ease-out;
}

.slide-in {
  animation: slideIn var(--transition-base) ease-out;
}

/* Dark Mode */
@media (prefers-color-scheme: dark) {
  :root {
    --background: #000000;
    --surface: rgba(30, 30, 30, 0.8);
    --border: rgba(255, 255, 255, 0.1);
    --text: #FFFFFF;
    --text-secondary: #8E8E93;
  }
}

/* Responsive Design */
@media (max-width: 768px) {
  #menu_container {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 50px;
    border-top: 1px solid var(--border);
    border-bottom: none;
  }
  
  .glass-panel {
    border-radius: 8px;
  }
}

EOD;
echo $css;
?>