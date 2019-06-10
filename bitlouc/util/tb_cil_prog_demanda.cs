using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Bitlouc
{
    #region Tb_cil_prog_demanda
    public class Tb_cil_prog_demanda
    {
        #region Member Variables
        protected int _id;
        protected int _programacao_id;
        protected int _tipo_id;
        protected int _qtd;
        #endregion
        #region Constructors
        public Tb_cil_prog_demanda() { }
        public Tb_cil_prog_demanda(int programacao_id, int tipo_id, int qtd)
        {
            this._programacao_id=programacao_id;
            this._tipo_id=tipo_id;
            this._qtd=qtd;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual int Programacao_id
        {
            get {return _programacao_id;}
            set {_programacao_id=value;}
        }
        public virtual int Tipo_id
        {
            get {return _tipo_id;}
            set {_tipo_id=value;}
        }
        public virtual int Qtd
        {
            get {return _qtd;}
            set {_qtd=value;}
        }
        #endregion
    }
    #endregion
}