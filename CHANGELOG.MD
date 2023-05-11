# Changelog

[V.0.1](#V.0.1)

### V.0.1
#### Added
- Adding basic plugin load functions
- Preventing to load if tried directly
- Adding password hashing function
- Added Hooks:
  - On user_register call create_trinity_user function
  - On Init call init function
- Defined named constants:
  - TSCONNECT_PLUGIN_DIR
- Admin class only loaded if is_admin()