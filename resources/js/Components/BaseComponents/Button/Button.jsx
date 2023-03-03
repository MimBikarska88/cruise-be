const Button = ({ className, onClick, value, type }) => {
  return (
    <button
      onClick={onClick}
      className={`btn btn-outline-dark rounded-0 ${className}`}
      type={!type ? "button" : "submit"}
      aria-selected="true"
    >
      {value}
    </button>
  );
};
export default Button;
